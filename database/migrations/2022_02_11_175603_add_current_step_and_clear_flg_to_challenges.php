<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCurrentStepAndClearFlgToChallenges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('challenges', function (Blueprint $table) {
            // レコード削除
            DB::statement('DELETE FROM challenges');
            // カラム追加
            $table->integer('current_step')->default(1);
            $table->integer('clear_flg')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('challenges', function (Blueprint $table) {
            // カラム削除
            $table->dropColumn('current_step');
            $table->dropColumn('clear_flg');
        });
    }
}
