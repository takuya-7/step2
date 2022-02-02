<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StepsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('steps')->insert([
            ['title' => '1年で未経験から自社開発系エンジニアに転職するためのSTEP', 'estimated_achievement_day' => 365, 'estimated_achievement_hour' => 0,'description' => '結論から言うと、しっかりとやることをやれば１年で未経験から自社開発系企業へエンジニアとして転職できます。このSTEPでは、具体的に手順をまとめているため何をやれば良いのか一目瞭然です。このSTEPで、今後の人生をより良くしましょう！', 'user_id' => '1', 'category_id' => '1', 'created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['title' => '3ヶ月でTOEIC600点→900点にした手順を解説！', 'estimated_achievement_day' => 90, 'estimated_achievement_hour' => 0,'description' => 'TOEIC900点は難しいと思っていませんか？実際はそんなことはありません。実際に私が３ヶ月で点数を300点上げて900点取った方法を解説しますので、ご安心下さい。TOEICの点数を上げたい方は、このSTEPをご覧下さい！', 'user_id' => '1', 'category_id' => '3', 'created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['title' => '１日でスノーボードをそれなりに滑られるようになるSTEP', 'estimated_achievement_day' => 0, 'estimated_achievement_hour' => 6,'description' => 'スノボ初心者の方は、１日だと全く滑れるようにならないと思っているかもしれませんが、そんなことはありません！ここで解説する手順で段階的に練習すれば、１日である程度滑れるようになります。それではいきましょう！', 'user_id' => '1', 'category_id' => '5', 'created_at' => Carbon::now(),'updated_at' => Carbon::now()],
        ]);
    }
}
