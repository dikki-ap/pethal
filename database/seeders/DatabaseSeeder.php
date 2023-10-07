<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Day;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            "name" => "Administrator",
            "email" => "admin@gmail.com",
            "password" => Hash::make('123'),
            "phone" => "082369220645",
            "role" => "Admin"
        ]);

        User::create([
            "name" => "Hani Annisa",
            "email" => "hani.a@gmail.com",
            "password" => Hash::make('123'),
            "phone" => "085283321122",
            "role" => "Member"
        ]);

        ProductType::create([
            "name" => "Food"
        ]);

        ProductType::create([
            "name" => "Health"
        ]);

        ProductType::create([
            "name" => "Accessories"
        ]);

        Product::create([
            "name" => "Cat Choize 1KG",
            "product_type_id" => 1,
            "price" => 26000,
            "description" => "Makanan kucing 1KG cocok untuk kitten dan kucing dewasa"
        ]);

        Day::create([
            "name" => "Monday",
        ]);
        Day::create([
            "name" => "Tuesday",
        ]);
        Day::create([
            "name" => "Wednesday",
        ]);
        Day::create([
            "name" => "Thursday",
        ]);
        Day::create([
            "name" => "Friday",
        ]);
        Day::create([
            "name" => "Saturday",
        ]);
        Day::create([
            "name" => "Sunday",
        ]);
    }
}
