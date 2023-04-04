<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('phone_comments', function (Blueprint $table) {
            $table->id();
            //создаем отношения телефона и комментария
            $table->unsignedBigInteger('phone_id');
            $table->unsignedBigInteger('comment_id');

            $table->index('phone_id', 'phone_comment_phone_idx');
            $table->index('comment_id', 'phone_comment_comment_idx');

            $table->foreign('phone_id', 'phone_comment_phone_fk')->on('phone_base')->references('id');
            $table->foreign('comment_id', 'phone_comment_comment_fk')->on('comments')->references('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phone_comments');
    }
};
