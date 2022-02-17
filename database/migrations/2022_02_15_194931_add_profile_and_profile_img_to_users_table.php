<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileAndProfileImgToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // レコード削除
            DB::statement('DELETE FROM users');
            // カラム追加
            $table->text('profile')->nullable();
            $table->text('profile_img')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // カラム削除
            $table->dropColumn('profile');
            $table->dropColumn('profile_img');
        });
    }
}
