<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Step;

class TopController extends Controller
{
    public function index(){
        $categories = Category::all();
        $steps = Step::all();

        return view('index', ['steps' => $steps, 'categories' => $categories]);
    }
}
