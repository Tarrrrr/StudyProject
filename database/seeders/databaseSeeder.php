<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\phoneBaseModels\categoryModel;
use App\Models\phoneBaseModels\phoneBaseModel;
use App\Models\phoneBaseModels\tagModel;
use Illuminate\Database\Seeder;

class databaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //создание 5 категорий из фабрики
        categoryModel::factory(5)->create();
        //создание 10 тегов из фабрики
        $tags = tagModel::factory(10)->create();
        //создание 50 телефонов из фабрики
        $phones = phoneBaseModel::factory(50)->create();

        //присваиваем телефону по 2 тега
        foreach ($phones as $phone) {
            $tagsIds = $tags->random(2)->pluck('id');
            $phone->tags()->attach($tagsIds);
        }

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
