<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        //\App\Models\Category::factory(5)->create();

        $categ = \App\Models\Category::factory()->create([
            'name'        => 'Pianos',
        ]);
        $categ = \App\Models\Category::factory()->create([
            'name'        => 'Guitars',
        ]);
        $categ = \App\Models\Category::factory()->create([
            'name'        => 'Piano Music',
        ]);
        $categ = \App\Models\Category::factory()->create([
            'name'        => 'Guitar Music',
        ]);
        $categ = \App\Models\Category::factory()->create([
            'name'        => 'Piano accessories',
        ]);
        $categ = \App\Models\Category::factory()->create([
            'name'        => 'Guitar accessories',
        ]);
        \App\Models\Item::factory(30)->create();
        //\App\Models\Order::factory(10)->create();
        \App\Models\Review::factory(10)->create();
        $this->call(PermissionSeeder::class);
    }
}
