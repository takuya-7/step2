<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Category;
use App\Models\Step;

class TopController extends Controller
{
    public function index(){
        // ログインしている場合、マイページへリダイレクトする
        if(Auth::check()){
            return redirect('/mypage');
        }
        $categories = Category::all();
        $steps = Step::all();

        return view('index', ['steps' => $steps, 'categories' => $categories]);
    }
}
