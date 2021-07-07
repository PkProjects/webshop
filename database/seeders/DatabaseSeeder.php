<?php

namespace Database\Seeders;

use Facade\Ignition\Support\FakeComposer;
use Faker\Generator;
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
        // BASE CATEGORIES

        $categ = \App\Models\Category::factory()->create([
            'name'        => 'Pianos',
            'image'       => 'piano.png'
        ]);
        $categ = \App\Models\Category::factory()->create([
            'name'        => 'Guitars',
            'image'       => 'guitar.jpg'
        ]);
        $categ = \App\Models\Category::factory()->create([
            'name'        => 'Piano Music',
            'image'       => 'pmusic.jpg'
        ]);
        $categ = \App\Models\Category::factory()->create([
            'name'        => 'Guitar Music',
            'image'       => 'gmusic.png'
        ]);
        $categ = \App\Models\Category::factory()->create([
            'name'        => 'Piano accessories',
            'image'       => 'paccessories.jpeg'
        ]);
        $categ = \App\Models\Category::factory()->create([
            'name'        => 'Guitar accessories',
            'image'       => 'gaccessories.jpg'
        ]);

        // BASE ITEMS
        // PIANOS
        $piano = \App\Models\Item::factory()->create([
            'name' => "Piano1",
            'price' => 5000,
            'summary' => 'X here',
            'category_id' => 1,
            'image' => 'piano.png',
            'supply' => true,
            'properties' => 'X here',
            'onSale' => 'true'        
        ]);
        $piano = \App\Models\Item::factory()->create([
            'name' => "Piano2",
            'price' => 5000,
            'summary' => 'X here',
            'category_id' => 1,
            'image' => 'piano.png',
            'supply' => true,
            'properties' => 'X here',   
            'onSale' => 'false'             
        ]);
        $piano = \App\Models\Item::factory()->create([
            'name' => "Piano3",
            'price' => 5000,
            'summary' => 'X here',
            'category_id' => 1,
            'image' => 'piano.png',
            'supply' => true,
            'properties' => 'X here',   
            'onSale' => 'false'             
        ]);
        // GUITARS
        $guitar = \App\Models\Item::factory()->create([
            'name' => "Guitar1",
            'price' => 2000,
            'summary' => 'X here',
            'category_id' => 2,
            'image' => 'guitar.jpg',
            'supply' => true,
            'properties' => 'X here',   
            'onSale' => 'false'             
        ]);
        $guitar = \App\Models\Item::factory()->create([
            'name' => "Guitar2",
            'price' => 2000,
            'summary' => 'X here',
            'category_id' => 2,
            'image' => 'guitar.jpg',
            'supply' => true,
            'properties' => 'X here',  
            'onSale' => 'false'              
        ]);
        $guitar = \App\Models\Item::factory()->create([
            'name' => "Guitar3",
            'price' => 2000,
            'summary' => 'X here',
            'category_id' => 2,
            'image' => 'guitar.jpg',
            'supply' => true,
            'properties' => 'X here',   
            'onSale' => 'true'             
        ]);
        // PIANO MUSIC
        $pmusic = \App\Models\Item::factory()->create([
            'name' => "PMusic1",
            'price' => 20,
            'summary' => 'X here',
            'category_id' => 3,
            'image' => 'pmusic.jpg',
            'supply' => true,
            'properties' => 'X here',   
            'onSale' => 'false'             
        ]);
        $pmusic = \App\Models\Item::factory()->create([
            'name' => "PMusic2",
            'price' => 20,
            'summary' => 'X here',
            'category_id' => 3,
            'image' => 'pmusic.jpg',
            'supply' => true,
            'properties' => 'X here',    
            'onSale' => 'false'            
        ]);
        $pmusic = \App\Models\Item::factory()->create([
            'name' => "PMusic3",
            'price' => 20,
            'summary' => 'X here',
            'category_id' => 3,
            'image' => 'pmusic.jpg',
            'supply' => true,
            'properties' => 'X here',    
            'onSale' => 'false'            
        ]);
        // GUITAR MUSIC
        $gmusic = \App\Models\Item::factory()->create([
            'name' => "GMusic1",
            'price' => 20,
            'summary' => 'X here',
            'category_id' => 4,
            'image' => 'gmusic.png',
            'supply' => true,
            'properties' => 'X here',    
            'onSale' => 'false'            
        ]);
        $gmusic = \App\Models\Item::factory()->create([
            'name' => "GMusic2",
            'price' => 20,
            'summary' => 'X here',
            'category_id' => 4,
            'image' => 'gmusic.png',
            'supply' => true,
            'properties' => 'X here',    
            'onSale' => 'false'            
        ]);
        $gmusic = \App\Models\Item::factory()->create([
            'name' => "GMusic3",
            'price' => 20,
            'summary' => 'X here',
            'category_id' => 4,
            'image' => 'gmusic.png',
            'supply' => true,
            'properties' => 'X here',    
            'onSale' => 'true'            
        ]);
        // PIANO ACCESSORIES
        $paccess = \App\Models\Item::factory()->create([
            'name' => "PAccessory1",
            'price' => 10,
            'summary' => 'X here',
            'category_id' => 5,
            'image' => 'paccessories.jpeg',
            'supply' => true,
            'properties' => 'Properties here',    
            'onSale' => 'false'            
        ]);
        $paccess = \App\Models\Item::factory()->create([
            'name' => "PAccessory2",
            'price' => 10,
            'summary' => 'X here',
            'category_id' => 5,
            'image' => 'paccessories.jpeg',
            'supply' => true,
            'properties' => 'Properties here',   
            'onSale' => 'false'             
        ]);
        $paccess = \App\Models\Item::factory()->create([
            'name' => "PAccessory3",
            'price' => 10,
            'summary' => 'X here',
            'category_id' => 5,
            'image' => 'paccessories.jpeg',
            'supply' => true,
            'properties' => 'Properties here',    
            'onSale' => 'true'            
        ]);
        // GUITAR ACCESSORIES
        $gaccess = \App\Models\Item::factory()->create([
            'name' => "GAccessory1",
            'price' => 15,
            'summary' => 'Summary here',
            'category_id' => 6,
            'image' => 'gaccessories.jpg',
            'supply' => true,
            'properties' => 'Properties here',   
            'onSale' => 'false'             
        ]);
        $gaccess = \App\Models\Item::factory()->create([
            'name' => "GAccessory2",
            'price' => 15,
            'summary' => 'Summary here',
            'category_id' => 6,
            'image' => 'gaccessories.jpg',
            'supply' => true,
            'properties' => 'Properties here',   
            'onSale' => 'false'             
        ]);
        $gaccess = \App\Models\Item::factory()->create([
            'name' => "GAccessory3",
            'price' => 15,
            'summary' => 'Summary here',
            'category_id' => 6,
            'image' => 'gaccessories.jpg',
            'supply' => true,
            'properties' => 'Properties here',   
            'onSale' => 'false'             
        ]);
        //\App\Models\Item::factory(30)->create();
        //\App\Models\Order::factory(10)->create();
        \App\Models\Review::factory(10)->create();
        $this->call(PermissionSeeder::class);
    }
}
