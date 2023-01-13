<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('pass');
            // $table->unsignedBigInteger('user_id');//外部キー
            $table->timestamps();

            // リレーションシップの設定
            // 外部キー「user_id」はテーブル「reviews」の「id」列を参照する
            // $table->foreign('user_id')->references('id')->on('reviews');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
};
