<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;

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

        // "name": "Socks",
        // "category": "Garments",
        // "description": "Pink socks",
        // "date_and_time": "2023-02-05 10:46:52"
        Product::factory(2)->create([
           'name' => 'Pink Socks',
           'category' => 'Socks',
           'description' => 'Knitted Pink socks'
        ]);

        Product::factory(2)->create([
            'name' => 'Gray Socks',
            'category' => 'Socks',
            'description' => 'Knitted Gray socks'
        ]);

        Product::factory(2)->create([
            'name' => 'Blue Cardigan',
            'category' => 'Cardigan',
            'description' => 'Knitted blue cardigan'
        ]);

        Product::factory(2)->create([
            'name' => 'Purple Cardigan',
            'category' => 'Cardigan',
            'description' => 'Knitted purple cardigan'
        ]);
        
        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
        ]);
        User::factory()->create([
            'name' => 'Jane Doe',
            'email' => 'janedoe@example.com',
        ]);
    }
}
