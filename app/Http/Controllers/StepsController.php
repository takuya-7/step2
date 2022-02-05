<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Step;
use App\Models\ChildStep;
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

        return view('steps.show', ['step' => $step, 'created_at' => $created_at, 'updated_at' => $updated_at, 'category' => $category, 'child_steps' => $child_steps]);
    }
    // 子STEP詳細画面表示
    public function showChild(){
        // $steps = Step::all();

        return view('steps.child-step');
        // return view('steps.showChild', ['drills' => $steps]);   
    }
    // STEP登録画面表示
    public function new(){
        // 子ステップのフォーム表示数を設定
        $child_steps_num = 10;
        return view('steps.new', ['categories' => Category::all(), 'child_steps_num' => $child_steps_num]);
    }
    // STEP新規作成処理
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'estimated_achievement_day' => 'nullable|integer',
            'estimated_achievement_hour' => 'nullable|integer',
            'description' => 'required|string',
            'category_id' => 'required|integer',
            'child-step1-title' => 'required|string',
            'child-step1-description' => 'required|string',
        ]);
        
        // --------------------------------
        // step登録
        $step = new Step;
        // データをセット
        $step->title = $request->title;
        $step->estimated_achievement_day = isset($request->estimated_achievement_day) ? $request->estimated_achievement_day : 0;
        $step->estimated_achievement_hour = isset($request->estimated_achievement_hour) ? $request->estimated_achievement_hour : 0;
        $step->description = $request->description;
        $step->category_id = $request->category_id;
        // step保存
        // $step->save();
        Auth::user()->steps()->save($step);
        
        // ログインユーザーの投稿STEPをDBに保存
        // Auth::user()->steps()->save($step->fill($request->all()));
        
        // --------------------------------
        // child_step登録
        // step_id取得
        $step_id = $step->id;
        // chiild_stepを配列で保持
        $child_steps = [
            [
                'order' => 1,
                'title' => $request->get('child-step001-title'),
                'description' => $request->get('child-step001-description'),
                'step_id' => $step_id,
            ],
        ];
        $child_step = new ChildStep;
        // データをセット
        $child_step->order = $child_steps[0]['order'];
        $child_step->title = $child_steps[0]['title'];
        $child_step->description = $child_steps[0]['description'];
        $child_step->step_id = $child_steps[0]['step_id'];
        // 保存
        // $child_step->save();

        $step->childSteps()->save($child_step);


        // マイページへリダイレクト
        return redirect()->route('mypage')->with('flash_message', __('STEPが投稿されました！'));        
    }
    // STEP編集画面表示
    public function edit(){
        return view('steps.edit');
    }
}
