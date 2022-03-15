<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StepRequest;

use App\Models\Category;
use App\Models\Step;
use App\Models\ChildStep;
use App\Models\Challenge;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StepsController extends Controller
{
    // STEP一覧画面表示
    public function index(){
        $categories = Category::all();
        $steps = Step::all();

        return view('steps.index', ['steps' => $steps], ['categories' => $categories]);
        
    }
    // STEP詳細画面表示
    public function show($id){
        // GETパラメータが数字かどうかをチェック
        if(!ctype_digit($id)){
            return redirect(route('steps.index'))->with('flash_message', __('Invalid operation was performed.'));
        }
        // step取得
        $step = Step::find($id);
        $category = Category::find($step->category_id)->name;
        $created_at = date('Y/m/d', strtotime($step->created_at));
        $updated_at = date('Y/m/d', strtotime($step->updated_at));

        // child_step取得
        $child_steps = ChildStep::where('step_id', $id)->get();

        // challenge取得
        if(!empty(auth()->user()->id)){
            $challenge = Challenge::where('step_id', $step->id)->where('user_id', auth()->user()->id)->first();
        }else{
            $challenge = null;
        }

        return view('steps.show', compact('step', 'created_at', 'updated_at', 'category', 'child_steps', 'challenge'));
    }
    // 子STEP詳細画面表示
    public function showChild($id, $order){
        // GETパラメータが数字かどうかをチェック
        if(!ctype_digit($id) && !ctype_digit($order)){
            return redirect(route('steps.index'))->with('flash_message', __('Invalid operation was performed.'));
        }
        // step取得
        $step = Step::find($id);
        $category = Category::find($step->category_id)->name;
        $created_at = date('Y/m/d', strtotime($step->created_at));
        $updated_at = date('Y/m/d', strtotime($step->updated_at));

        // child_step取得
        $child_steps = ChildStep::where('step_id', $id)->get();
        // 該当のchild_stepを取得
        $child_step = ChildStep::where('step_id', $id)->where('order', $order)->get();

        // challenge取得
        if(!empty(auth()->user()->id)){
            $challenge = Challenge::where('step_id', $step->id)->where('user_id', auth()->user()->id)->first();
        }else{
            $challenge = null;
        }

        return view('steps.child-step', compact('step', 'created_at', 'updated_at', 'category', 'child_step', 'child_steps', 'challenge'));
    }
    // STEP登録画面表示
    public function new(){
        // カテゴリー取得
        $categories = Category::all();
        // 子ステップのフォーム表示数を設定
        $child_steps_num = 10;
        return view('steps.new', compact('categories', 'child_steps_num'));
    }
    // STEP新規作成処理
    public function create(StepRequest $request)
    {
        // --------------------------------
        // step登録処理
        $step = new Step;
        // データをセット
        $step->title = $request->title;
        $step->estimated_achievement_day = isset($request->estimated_achievement_day) ? $request->estimated_achievement_day : 0;
        $step->estimated_achievement_hour = isset($request->estimated_achievement_hour) ? $request->estimated_achievement_hour : 0;
        $step->description = $request->description;
        $step->category_id = $request->category_id;
        // ログインユーザーの投稿STEPをDBに保存
        Auth::user()->steps()->save($step);
        
        // --------------------------------
        // child_step登録処理
        // step_id取得
        $step_id = $step->id;
        // 入力されたchiild_stepを配列に格納
        $child_steps = [];
        for($i = 1; $i <= 10; $i++){
            if(!empty($request->get('child-step'.$i.'-title')) && !empty($request->get('child-step'.$i.'-description'))){
                $child_steps[] = [
                    'order' => $i,
                    'title' => $request->get('child-step'.$i.'-title'),
                    'description' => $request->get('child-step'.$i.'-description'),
                    'step_id' => $step_id,
                ];
            }
        }
        // 入力されたchild_stepsを展開、データをセットしてDBへ保存する
        foreach ($child_steps as $key => $value) {
            $child_step = new ChildStep;
            $child_step->order = $value['order'];
            $child_step->title = $value['title'];
            $child_step->description = $value['description'];
            // 保存
            $step->childSteps()->save($child_step);
        }
        // マイページへリダイレクト
        return redirect()->route('mypage')->with('flash_message', __('STEPが投稿されました！'));
    }
    // STEP編集画面表示
    public function edit($id){
        // GETパラメータが数字かどうかをチェック
        if(!ctype_digit($id)){
            return redirect(route('steps.new'))->with('flash_message', __('Invalid operation was performed.'));
        }

        // カテゴリー取得
        $categories = Category::all();
        // 子STEP数設定
        $child_steps_num = 10;
        // 対象のSTEPを取得
        $step = Auth::user()->steps()->find($id);
        // 子STEPを取得
        $child_steps = ChildStep::where('step_id', $step->id)->get();
        return view('steps.edit', compact('categories', 'child_steps_num', 'step', 'child_steps'));
    }
    // STEP更新処理
    public function update(StepRequest $request, $id){
        // GETパラメータが数字かどうかをチェック
        if(!ctype_digit($id)){
            return redirect(route('steps.new'))->with('flash_message', __('Invalid operation was performed.'));
        }
        // --------------------------------
        // step更新処理
        $step = Step::find($id);
        // データをセット
        $step->title = $request->title;
        $step->estimated_achievement_day = isset($request->estimated_achievement_day) ? $request->estimated_achievement_day : 0;
        $step->estimated_achievement_hour = isset($request->estimated_achievement_hour) ? $request->estimated_achievement_hour : 0;
        $step->description = $request->description;
        $step->category_id = $request->category_id;
        // ログインユーザーの投稿STEPをDBに保存
        Auth::user()->steps()->save($step);
        
        // --------------------------------
        // child_step更新処理
        // step_id取得
        $step_id = $step->id;
        // 入力されたchiild_stepを配列に格納
        $child_steps = [];
        for($i = 1; $i <= 10; $i++){
            if(!empty($request->get('child-step'.$i.'-title')) && !empty($request->get('child-step'.$i.'-description'))){
                $child_steps[] = [
                    'order' => $i,
                    'title' => $request->get('child-step'.$i.'-title'),
                    'description' => $request->get('child-step'.$i.'-description'),
                    'step_id' => $step_id,
                ];
            }
        }
        // 入力されたchild_stepsを展開、データをセットしてDBへ保存する
        foreach ($child_steps as $key => $value) {
            DB::table('child_steps')->updateOrInsert(
                ['step_id' => $id, 'order' => $value['order']],
                ['order' => $value['order'], 'title' => $value['title'], 'description' => $value['description']]
            );
        }
        // マイページへリダイレクト
        return redirect()->route('mypage')->with('flash_message', __('STEPが更新されました！'));        
    }

    // 削除処理アクション
    public function destroy($id)
    {
        // GETパラメータが数字かどうかをチェック
        if(!ctype_digit($id)){
            return redirect('mypage')->with('flash_message', __('Invalid operation was performed.'));
        }
        
        // STEP削除（STEP削除で子STEP、チャレンジも削除される）
        Step::find($id)->delete();

        return redirect('mypage')->with('flash_message', __('STEPが削除されました。'));
    }
}
