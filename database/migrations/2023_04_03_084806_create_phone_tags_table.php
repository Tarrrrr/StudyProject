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
        Schema::create('phone_tags', function (Blueprint $table) {
            $table->id();
            //создаем отношения телефона и комментария
            $table->unsignedBigInteger('phone_id');
            $table->unsignedBigInteger('tag_id');

            $table->index('phone_id', 'phone_tag_phone_idx');
            $table->index('tag_id', 'phone_tag_tag_idx');

            $table->foreign('phone_id', 'phone_tag_phone_fk')->on('phone_base')->references('id');
            $table->foreign('tag_id', 'phone_tag_tag_fk')->on('tags')->references('id');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phone_tags');
    }
};
