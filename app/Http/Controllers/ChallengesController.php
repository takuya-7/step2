<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Challenge;
use App\Models\Step;
use Illuminate\Support\Facades\Auth;

class ChallengesController extends Controller
{
    // STEPチャレンジ登録
    public function challenge(Step $step, Request $request){
        $challenge = New Challenge();
        $challenge->step_id = $step->id;
        $challenge->user_id = Auth::user()->id;
        $challenge->save();

        // 子STEP1のページへ遷移
        return redirect(route('steps.showChild', ['id' => $step->id, 'order' => 1]));
    }
    // STEPチャレンジ削除
    public function unchallenge(Step $step, Request $request){
        $user = Auth::user()->id;
        $challenge = Challenge::where('step_id', $step->id)->where('user_id', $user)->first();
        $challenge->delete();
        return back();
    }
}
