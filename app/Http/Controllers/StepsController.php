<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StepsController extends Controller
{
    // STEP一覧画面表示
    public function index(){
        $steps = Step::all();

        // return view('steps.index');
        return view('steps.index', ['steps' => $steps]);
        
    }
    // STEP詳細画面表示
    public function show(){
        // $steps = Step::all();

        return view('steps.show');
        // return view('steps.show', ['drills' => $steps]);   
    }
    // 子STEP詳細画面表示
    public function showChild(){
        // $steps = Step::all();

        return view('steps.child-step');
        // return view('steps.showChild', ['drills' => $steps]);   
    }
    // STEP登録画面表示
    public function new(){

        return view('steps.new', ['categories' => Category::all()]);
    }
    // STEP新規作成処理
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'estimated_achievement_day' => 'integer',
            'estimated_achievement_hour' => 'integer',
            'description' => 'required|string',
            'category_id' => 'required|integer',
        ]);

        // モデルを使って、DBに登録する値をセット
        $step = new Step;

        // ログインユーザーの投稿STEPをDBに保存
        Auth::user()->steps()->save($step->fill($request->all()));

        // マイページへリダイレクト
        return redirect()->route('mypage')->with('flash_message', __('STEPが投稿されました！'));        
    }
    // STEP編集画面表示
    public function edit(){
        return view('steps.edit');
    }
}
