<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Challenge;
use App\Models\Step;
use App\Models\ChildStep;
use Illuminate\Support\Facades\Auth;

class ChallengesController extends Controller
{
    // STEPチャレンジ登録
    public function challenge($step_id){
        $challenge = New Challenge();
        $challenge->step_id = $step_id;
        $challenge->user_id = Auth::user()->id;
        $challenge->save();

        // 子STEP1のページへ遷移
        return redirect(route('steps.showChild', ['id' => $step_id, 'order' => 1]));
    }
    // STEPチャレンジ削除
    public function unchallenge($step_id){
        $user = Auth::user()->id;
        $challenge = Challenge::where('step_id', $step_id)->where('user_id', $user)->first();
        $challenge->delete();
        return back();
    }

    // 子STEPクリア
    public function clear($step_id){
        $user = Auth::user()->id;
        $challenge = Challenge::where('step_id', $step_id)->where('user_id', $user)->first();
        $challenge->current_step = $challenge->current_step + 1;

        // 子ステップ取得
        $child_steps = ChildStep::where('step_id', $step_id)->get();

        // 子STEPを全てクリアしたとき（$challenge->current_step > 総子STEP数）
        if($challenge->current_step > count($child_steps)){
            $challenge->clear_flg = 1;
            $challenge->save();
            // マイページへ遷移
            return redirect(route('mypage'));
        }
        $challenge->save();

        // 次の子STEPページへ遷移
        return redirect(route('steps.showChild', ['id' => $step_id, 'order' => $challenge->current_step]));
    }
}
