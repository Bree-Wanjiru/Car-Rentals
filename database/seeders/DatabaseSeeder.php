<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Rental;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {     
        //    creates 10 dummy users from factories
        //  \App\Models\User::factory(5)->create();

         //let a user own all the listing available
         $user = User::factory()->create([
            'name'=> 'Alison Doe',
            'email'=>'alison@gmail.com'
         ]);
 
        Rental::factory(6)->create([
            'user_id' => $user->id
        ]);
        //  Rental::create([
        //     'title'=>'Toyota',
        //     'tags'=> 'New model',
        //     'company'=> 'High Cars',
        //     'location'=> 'Nairobi, Kenya',
        //     'email'=>'email1@email.com',
        //     'website' =>'https://www.highcars.com',
        //     'description'=>'This is a description'
        //  ]);

        //  Rental::create([
            
        //         'title'=>'BMW',
        //         'tags'=> 'New model',
        //         'company'=> 'Zee Cars',
        //         'location'=> 'Nairobi, Kenya',
        //         'email'=>'email2@email.com',
        //         'website' =>'https://www.zeecars.com',
        //         'description'=>'This is a description'
            
        //  ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
