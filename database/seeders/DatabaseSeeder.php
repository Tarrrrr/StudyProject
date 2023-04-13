<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\CategoryModel;
use App\Models\PhoneBaseModel;
use App\Models\TagModel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //создание 5 категорий из фабрики
        CategoryModel::factory(5)->create();
        //создание 10 тегов из фабрики
        $tags = TagModel::factory(10)->create();
        //создание 50 телефонов из фабрики
        $phones = PhoneBaseModel::factory(50)->create();

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
