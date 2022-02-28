<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ChildStepsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('child_steps')->insert([
            ['order' => 1, 'title' => 'HTML', 'estimated_achievement_day' => NULL, 'estimated_achievement_hour' => NULL, 'description' => 'まずはWebサイトの骨格を作るHTMLからです。Progateやドットインストールでさらっと勉強しましょう。', 'step_id' => 1, 'delete_flg' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['order' => 2, 'title' => 'CSS', 'estimated_achievement_day' => NULL, 'estimated_achievement_hour' => NULL, 'description' => '次は装飾を施すCSSです。Progateやドットインストールでさらっと勉強しましょう。', 'step_id' => 1, 'delete_flg' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['order' => 3, 'title' => 'JavaScript', 'estimated_achievement_day' => NULL, 'estimated_achievement_hour' => NULL, 'description' => '次はWebサイトに動きをつけるJavaScriptです。Progateやドットインストールでさらっと勉強しましょう。', 'step_id' => 1, 'delete_flg' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['order' => 4, 'title' => 'PHP', 'estimated_achievement_day' => NULL, 'estimated_achievement_hour' => NULL, 'description' => 'バックエンド言語の一つ、PHPを勉強しましょう。Progateやドットインストールでさらっと勉強しましょう。', 'step_id' => 1, 'delete_flg' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['order' => 5, 'title' => 'Laravel', 'estimated_achievement_day' => NULL, 'estimated_achievement_hour' => NULL, 'description' => 'PHPのフレームワーク、Laravelを勉強しましょう。Udemyで分かりやすそうな動画を見て一通り学びましょう。', 'step_id' => 1, 'delete_flg' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['order' => 6, 'title' => 'アプリを作って公開', 'estimated_achievement_day' => NULL, 'estimated_achievement_hour' => NULL, 'description' => 'Laravelを一通り勉強したら、自分でアプリを作ってみましょう。誰かの悩みを解決できるアプリがポイントです。既存のサービスを真似て、方向性を変えるのも良いです。アプリを作ったら、AWSで公開してみましょう。', 'step_id' => 1, 'delete_flg' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['order' => 7, 'title' => 'アプリを元に転職活動', 'estimated_achievement_day' => NULL, 'estimated_achievement_hour' => NULL, 'description' => 'アプリの完成度を上げて公開できたら、Wantedlyに登録して転職活動を始めましょう。採用者の視点に立って、資料を作成してアピールするようにしましょう。', 'step_id' => 1, 'delete_flg' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['order' => 1, 'title' => '単語を抑える', 'estimated_achievement_day' => NULL, 'estimated_achievement_hour' => NULL, 'description' => 'TOEICで出る単語はある程度限られているため、まずは参考書で一通り単語を抑えましょう。', 'step_id' => 2, 'delete_flg' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['order' => 2, 'title' => '過去問を3回以上解く', 'estimated_achievement_day' => NULL, 'estimated_achievement_hour' => NULL, 'description' => 'TOEICの勉強で1番大事なのが、過去問での勉強です。最低3回は解きましょう。', 'step_id' => 2, 'delete_flg' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['order' => 3, 'title' => '時間を意識して過去問を解く', 'estimated_achievement_day' => NULL, 'estimated_achievement_hour' => NULL, 'description' => 'TOEICは多くの問題を時間内に解かなければならないため、時間を計って時間内に全て回答できるようにしましょう。', 'step_id' => 2, 'delete_flg' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['order' => 1, 'title' => 'ボードに片足固定した状態で移動できるようにする', 'estimated_achievement_day' => NULL, 'estimated_achievement_hour' => NULL, 'description' => 'まずはボードに片足固定した状態で移動できるようにしましょう。', 'step_id' => 3, 'delete_flg' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['order' => 2, 'title' => '斜面で立つ', 'estimated_achievement_day' => NULL, 'estimated_achievement_hour' => NULL, 'description' => '斜面を見下ろす形で、まずは立ってバランスを取れるようにしましょう。', 'step_id' => 3, 'delete_flg' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['order' => 3, 'title' => '起き上がり方を身に着ける', 'estimated_achievement_day' => NULL, 'estimated_achievement_hour' => NULL, 'description' => '腹這いにこけた時は、一回転してから起き上がるようにしましょう。', 'step_id' => 3, 'delete_flg' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['order' => 4, 'title' => '体を真っ直ぐにして滑れるようにする', 'estimated_achievement_day' => NULL, 'estimated_achievement_hour' => NULL, 'description' => '怖がって後ろに重心がいくと滑れないので、斜面に対して真っ直ぐに立って滑るコツを掴みましょう。', 'step_id' => 3, 'delete_flg' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['order' => 5, 'title' => '緩い斜面でターンを習得する', 'estimated_achievement_day' => NULL, 'estimated_achievement_hour' => NULL, 'description' => '行く方向を見ながら、全身を使ってターンできるようにしましょう。', 'step_id' => 3, 'delete_flg' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['order' => 6, 'title' => '緩い斜面滑れるようにする', 'estimated_achievement_day' => NULL, 'estimated_achievement_hour' => NULL, 'description' => '緩い斜面で何度も練習し、ターンを繰り返して下まで滑れるようにしましょう。', 'step_id' => 3, 'delete_flg' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['order' => 7, 'title' => 'リフトで長めのコースに行く', 'estimated_achievement_day' => NULL, 'estimated_achievement_hour' => NULL, 'description' => '慣れてきたらリフトで斜面が緩い長めのコースへいきましょう。あとは練習あるのみです！', 'step_id' => 3, 'delete_flg' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
