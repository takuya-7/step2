<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StepRequest;

use App\Models\Category;
use App\Models\Step;
use App\Models\ChildStep;
use App\Models\Challenge;
use App\Models\User;
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
            return redirect(route('steps'))->with('flash_message', __('不正な操作がおこなわれました'));
        }
        // step取得
        $step = Step::find($id);
        if(empty($step)){
            return redirect(route('steps'))->with('flash_message', __('不正な操作がおこなわれました'));
        }
        $category = Category::find($step->category_id)->name;
        $created_at = date('Y/m/d', strtotime($step->created_at));
        $updated_at = date('Y/m/d', strtotime($step->updated_at));

        // child_step取得
        $child_steps = ChildStep::where('step_id', $id)->get();

        // 所要時間算出
        $estimated_achievement_hour = 0;
        foreach ($child_steps as $key => $value) {
            $estimated_achievement_hour += $value->estimated_achievement_hour;
        }
        // $add_estimated_achievement_day = floor($estimated_achievement_hour / 24);
        // $estimated_achievement_hour = $estimated_achievement_hour % 24;
        
        // 所要日数算出
        $estimated_achievement_day = 0;
        foreach ($child_steps as $key => $value) {
            $estimated_achievement_day += $value->estimated_achievement_day;
        }
        // $estimated_achievement_day = $estimated_achievement_day + $add_estimated_achievement_day;

        // challenge取得
        if(!empty(auth()->user()->id)){
            $challenge = Challenge::where('step_id', $step->id)->where('user_id', auth()->user()->id)->first();
        }else{
            $challenge = null;
        }

        // 著者情報取得
        $author = User::find($step->user_id);

        return view('steps.show', compact('step', 'created_at', 'updated_at', 'category', 'child_steps', 'challenge', 'author', 'estimated_achievement_day', 'estimated_achievement_hour'));
    }
    // 子STEP詳細画面表示
    public function showChild($id, $order){
        // GETパラメータが数字かどうかをチェック
        if(!ctype_digit($id) || !ctype_digit($order)){
            return redirect(route('steps'))->with('flash_message', __('不正な操作がおこなわれました'));
        }
        // step取得
        $step = Step::find($id);
        if(empty($step)){
            return redirect(route('steps'))->with('flash_message', __('不正な操作がおこなわれました'));
        }
        $category = Category::find($step->category_id)->name;
        $created_at = date('Y/m/d', strtotime($step->created_at));
        $updated_at = date('Y/m/d', strtotime($step->updated_at));

        // child_step取得
        $child_steps = ChildStep::where('step_id', $id)->get();
        if(empty($child_steps) | count($child_steps) < $order){
            return redirect(route('steps'))->with('flash_message', __('不正な操作がおこなわれました'));
        }
        // 該当のchild_stepを取得
        $child_step = ChildStep::where('step_id', $id)->where('order', $order)->get();
        if(empty($child_step)){
            return redirect(route('steps'))->with('flash_message', __('不正な操作がおこなわれました'));
        }

        // 著者情報取得
        $author = User::find($step->user_id);

        // チャレンジ状況によるアクセス制御
        // ログインチェック
        if(!empty(auth()->user()->id)){
            // challenge取得
            $challenge = Challenge::where('step_id', $step->id)->where('user_id', auth()->user()->id)->first();
            // チャレンジしている場合
            if($challenge){
                // チャレンジで到達していなければ、現在のステップへリダイレクト
                if($challenge->current_step < $order){
                    return redirect('/steps/'.$id.'/'.$challenge->current_step);
                }else{
                    // チャレンジで既に到達していればそのまま表示
                    return view('steps.child-step', compact('step', 'created_at', 'updated_at', 'category', 'child_step', 'child_steps', 'challenge', 'author'));
                }
            }else{
                // チャレンジしていなければ親ステップへリダイレクト
                return redirect(route('steps.show', $id));
            }
        }else{
            // ログインしていなければ親ステップへリダイレクト
            return redirect(route('steps.show', $id));
        }
    }
    // STEP登録画面表示
    public function new(){
        // カテゴリー取得
        $categories = Category::all();
        return view('steps.new', compact('categories'));
    }
    // STEP新規作成処理
    public function create(StepRequest $request)
    {
        // -------------------------------------------
        // 登録するデータ準備
        $step = new Step;
        // 入力されたchiild_step用配列
        $child_steps = [];
        // 全体の所要日数・所要時間算出用変数
        $estimated_achievement_day = 0;
        $estimated_achievement_hour = 0;
        // 送信された子ステップフォームの個数
        $child_step_form_count = $request->get('child_step_form_count');

        // 子ステップフォームの個数が100より大きければ登録ページへリダイレクト
        if($child_step_form_count > 100){
            return redirect()->route('/steps/new')->with('flash_message', __('登録できるステップは100個以下です'));
        }

        // 子STEPの入力情報（配列）を取得
        $child_step_title = $request->get('child_step_title');
        $child_step_estimated_achievement_day = $request->get('child_step_estimated_achievement_day');
        $child_step_estimated_achievement_hour = $request->get('child_step_estimated_achievement_hour');
        $child_step_description = $request->get('child_step_description');

        for($i = 0; $i < $child_step_form_count; $i++){
            // 入力された子STEPを配列に格納
            $child_steps[] = [
                'order' => $i + 1,
                'title' => $child_step_title[$i],
                'estimated_achievement_day' => $child_step_estimated_achievement_day[$i],
                'estimated_achievement_hour' => $child_step_estimated_achievement_hour[$i],
                'description' => $child_step_description[$i],
                'step_id' => $step->id,
            ];
            // 所要日数算出
            $estimated_achievement_day += $child_step_estimated_achievement_day[$i];
            // 所要時間算出
            $estimated_achievement_hour += $child_step_estimated_achievement_hour[$i];
        }

        // -------------------------------------------
        // step登録
        $step->title = $request->title;
        $step->estimated_achievement_day = $estimated_achievement_day;
        $step->estimated_achievement_hour = $estimated_achievement_hour;
        $step->description = $request->description;
        $step->category_id = $request->category_id;
        // ログインユーザーの投稿STEPをDBに保存
        Auth::user()->steps()->save($step);
        
        // -------------------------------------------
        // child_step登録
        // 入力されたchild_stepsを展開、データをセットしてDBへ保存する
        foreach ($child_steps as $key => $value) {
            $child_step = new ChildStep;
            $child_step->order = $value['order'];
            $child_step->title = $value['title'];
            $child_step->estimated_achievement_day = $value['estimated_achievement_day'];
            $child_step->estimated_achievement_hour = $value['estimated_achievement_hour'];
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
        // 対象のSTEPを取得
        $step = Auth::user()->steps()->find($id);
        if(empty($step)){
            return redirect()->route('mypage')->with('flash_message', __('不正な操作がおこなわれました'));
        }
        // 子STEPを取得
        $child_steps = ChildStep::where('step_id', $step->id)->get();
        if(empty($child_steps)){
            return redirect()->route('mypage')->with('flash_message', __('不正な操作がおこなわれました'));
        }
        return view('steps.edit', compact('categories', 'step', 'child_steps'));
    }
    // STEP更新処理
    public function update(StepRequest $request, $id){
        // GETパラメータが数字かどうかをチェック
        if(!ctype_digit($id)){
            return redirect(route('steps.new'))->with('flash_message', __('不正な操作がおこなわれました'));
        }
        // -------------------------------------------
        // 登録するデータ準備
        $step = Step::find($id);
        // 既に登録されている子STEPを取得
        $old_child_steps = ChildStep::where('step_id', $step->id)->get();
        // 全体の所要日数・所要時間算出用変数
        $estimated_achievement_day = 0;
        $estimated_achievement_hour = 0;
        // 送信された子ステップフォームの個数
        $child_step_form_count = $request->get('child_step_form_count');

        // 子STEPの入力情報（配列）を取得
        $child_step_title = $request->get('child_step_title');
        $child_step_estimated_achievement_day = $request->get('child_step_estimated_achievement_day');
        $child_step_estimated_achievement_hour = $request->get('child_step_estimated_achievement_hour');
        $child_step_description = $request->get('child_step_description');

        // 入力されたchiild_stepを配列に格納
        $child_steps = [];
        for($i = 0; $i < $child_step_form_count; $i++){
            // 入力された子STEPを配列に格納
            $child_steps[] = [
                'order' => $i + 1,
                'title' => $child_step_title[$i],
                'estimated_achievement_day' => $child_step_estimated_achievement_day[$i],
                'estimated_achievement_hour' => $child_step_estimated_achievement_hour[$i],
                'description' => $child_step_description[$i],
                'step_id' => $step->id,
            ];
            // 所要日数算出
            $estimated_achievement_day += $child_step_estimated_achievement_day[$i];
            // 所要時間算出
            $estimated_achievement_hour += $child_step_estimated_achievement_hour[$i];
        }

        // ステップ更新で子ステップ数を減らす場合（更新する子ステップ数 < 既に登録されている子ステップ数）
        if(count($child_steps) < count($old_child_steps)){
            $child_steps_count = count($child_steps);
            $old_child_steps_count = count($old_child_steps);
            // DBにある不要分子ステップを削除
            $delete_count = $old_child_steps_count - $child_steps_count;
            for($i = 0; $i < $delete_count; $i++){
                DB::table('child_steps')
                    ->where('step_id', $step->id)
                    ->where('order', $old_child_steps[$old_child_steps_count - 1 - $i]->order)
                    ->delete();
            }
            // 更新するステップのチャレンジを更新
            $update_challenges = Challenge::where('step_id', $step->id)->get();
            foreach($update_challenges as $key => $value){
                if($value['current_step'] > $child_steps_count){
                    DB::table('challenges')->updateOrInsert(
                        ['id' => $value->id],
                        [
                            'current_step' => $child_steps_count,
                            'clear_flg' => 0,
                        ]
                    );
                }
            }
        }

        // --------------------------------
        // step更新
        $step->title = $request->title;
        $step->estimated_achievement_day = $estimated_achievement_day;
        $step->estimated_achievement_hour = $estimated_achievement_hour;
        $step->description = $request->description;
        $step->category_id = $request->category_id;
        // ログインユーザーの投稿STEPをDBに保存
        Auth::user()->steps()->save($step);
        
        // --------------------------------
        // child_step更新
        foreach ($child_steps as $key => $value) {
            DB::table('child_steps')->updateOrInsert(
                ['step_id' => $step->id, 'order' => $value['order']],
                [
                    'order' => $value['order'],
                    'title' => $value['title'],
                    'estimated_achievement_day' => $value['estimated_achievement_day'],
                    'estimated_achievement_hour' => $value['estimated_achievement_hour'],
                    'description' => $value['description']
                ]
            );
        }

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
