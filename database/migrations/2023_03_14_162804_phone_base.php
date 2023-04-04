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
        //создание БД
        Schema::create('phone_base', function (Blueprint $table) {
            $table->id();
            //nullable - значит, что не может быть пустым и равняться нулю, будет выдавать ошибку
            $table->string('name')->nullable();
            $table->bigInteger('phone')->nullable();
            $table->string('address')->nullable();
            $table->date('birthday')->nullable();
            $table->string('country')->nullable();
            //создает время создания и изменения записи в БД
            $table->timestamps();
            //мягкое удаление (запись остается в бд, но не высвечивается)
            $table->softDeletes();

            //создание категории id (unsignedBigInteger - тип значений только с плюсом)
            $table->unsignedBigInteger('category_id')->nullable();
            //создание индекса из id категории
            $table->index('category_id', 'phone_category_idx');
            //создание форинки которая берет данные из БД категории(on) (берет id(references))
            $table->foreign('category_id', 'phone_category_fk')->on('categories')->references('id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //мягкое удаление из БД
        Schema::dropIfExists('phone_base');
    }
};
