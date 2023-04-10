<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    //    \App\Models\User::factory(3)->create();
       $user= User::factory()->create([
        'name'=>"gordon Otieno",
        'email'=>"test@test.test"
       ]);
       
    //    Listing::factory(5)->create([
    //     'user_id' => $user->id
    //    ]);
       Listing::create([
        'title' => 'React Developer',
        'user_id' => $user->id,
        'tags' => 'React,JavaScript,Jest',
        'company' => 'ABC Corp',
        'location' => 'Nairobi, Kenya',
        'email' => 'email1@email.com',
        'website' => 'https://www.test.com',
        'description' => 'A React developer is responsible for the design and implementation of user interfaces (UIs) and UI components using React, a front-end JavaScript library. They develop and maintain UIs for web and mobile apps.'
       ]);
       Listing::create([
         'title' => 'Full-Stack Engineer',
         'user_id' => $user->id,
         'tags' => 'laravel, backend ,api',
         'company' => 'Workable Industry',
         'location' => 'Nairobi-Kenya',
         'email' => 'email2@email.com',
         'website' => 'https://www.workable.com',
         'description' => 'We are looking for a Full Stack Developer to produce scalable software solutions. You’ll be part of a cross-functional team that’s responsible for the full software development life cycle, from conception to deployment.
         As a Full Stack Developer, you should be comfortable around both front-end and back-end coding languages, development frameworks and third-party libraries. You should also be a team player with a knack for visual design and utility.'
       ]);

       Listing::create([
        'title' => 'Backend Engineer',
        'user_id' => $user->id,
        'tags' => 'Ruby on Rails,RESTful Apis ,api',
        'company' => 'Sun Culture',
        'location' => 'Nairobi-Kenya',
        'email' => 'otienogordon95@email.com',
        'website' => 'https://www.gordomotieno.me',
        'description' => 'Backend developer responsibilities include creating, maintaining, testing, and debugging the entire back end of an application or system. This includes the core application logic, databases, data and application integration, API, and other processes taking place behind the scenes'
      ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
