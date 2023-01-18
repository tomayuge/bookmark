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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id'); //外部キー
            $table->double('score');
            $table->string('comment');
            $table->unsignedBigInteger('account_id');//外部キー
            

            // リレーションシップの設定
            // 外部キー「user_id」はテーブル「books」の「id」列を参照する
            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('account_id')->references('id')->on('accounts');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
