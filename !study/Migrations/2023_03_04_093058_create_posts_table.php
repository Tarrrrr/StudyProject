<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    //!добавление таблицы
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('likes')->nullable();
            $table->boolean('is_published')->default(1);
            $table->timestamps();
            //!мягкое удаление (запись остается в бд, но не высвечивается)
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    //!удаление таблицы
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
