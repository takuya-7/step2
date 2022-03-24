<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Step;
use App\Models\ChildStep;
use App\Models\Challenge;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{
    public function mypage(){
        // ユーザーIDを取得
        $user_id = auth()->id();
        // 投稿したSTEPを取得
        $registered_steps = Step::where('user_id', $user_id)->get();
        // チャレンジしているSTEPのidを取得
        $challenge_steps_id = Challenge::where('user_id', $user_id)->get(['step_id']);
        // チャレンジしているSTEPがある場合
        if($challenge_steps_id){
            // ユーザーのチャレンジ状況、チャレンジ中のSTEP・子STEPを取得
            $challenge_steps = Step::with(['challenges' => function ($query) {
                $query->where('user_id', auth()->id());
            }, 'childSteps'])->find($challenge_steps_id);
        }else{
            $challenge_steps = null;
        }
        
        return view('profile/mypage', compact('registered_steps', 'challenge_steps', 'challenge_steps_id'));
    }

    // ユーザー情報更新画面
    public function edit(){
        $user = Auth::user();
        return view('profile/edit', compact('user'));
    }
    // ユーザー情報更新処理
    public function update(Request $request){
        // バリデーション
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'profile' => 'nullable|string|max:255',
            'profile_img' => 'nullable|image|file',
        ]);

        // 新たにプロフィール画像が更新される場合
        if ($file = $request->profile_img) {
            // 画像名を生成、画像を対象ディレクトリへ保存
            $file_name = time() . $file->getClientOriginalName();
            $target_path = storage_path('app/public/uploads/');
            $file->move($target_path, $file_name);
        } else {
            $file_name = '';
        }

        // ユーザーのプロフィール画像名取得
        $user_profile_img = Auth::user()->profile_img;

        // 既にプロフィール画像が登録されていた場合
        if($user_profile_img){
            // 新たに画像が更新された場合
            if($file){
                // 既存の画像を削除
                Storage::disk('public')->delete('uploads/'.$user_profile_img);
            // 更新されなかった（ファイル選択されなかった）場合
            }else{
                // 既存のファイル名を格納
                $file_name = $user_profile_img;
            }
        }

        // DB更新
        DB::table('users')->where('id', auth()->user()->id)->update(['email' => $request->email, 'profile' => $request->profile, 'profile_img' => $file_name]);
        // マイページへ遷移
        return redirect()->route('mypage')->with('flash_message', __('プロフィールが更新されました！'));
    }
    
}
