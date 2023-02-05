<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

         \App\Models\User::create([
             'id' => 1,
             'name' => 'Dr Raul',
             'surname'=> 'Ramirez',
             'is_admin'=> true,
                'address' => 'Krakow 1324',
        'phone' => '+34 654 543 543',
             'password'=>Hash::make("Qwerty123"),
             'email' => 'te1st@example.com',
         ]);


         \App\Models\User::create([
             'id' => 2,
             'name' => 'Josephs',
             'surname'=> 'Smith',
                'password'=>Hash::make("Qwerty321"),
             'is_admin'=> false,
                'address' => 'Warszawa 15',
                'phone' => '+34 654 543 543',
             'email' => 'te2st@example.com',
         ]);

          \App\Models\User::create([
              'id' => 3,
              'name' => 'Joseddph',
              'surname'=> 'Smith',
              'password'=>Hash::make("Qwerty321"),
              'is_admin'=> false,
              'address' => 'Madrid 3032 Habanero street',
              'phone' => '+34 654 543 543',
              'email' => 'te4st@example.com',
          ]);
           \App\Models\User::create([
               'id' => 4,
               'name' => 'Dr Josddeph',
               'surname'=> 'Smith',
               'password'=>Hash::make("Qwerty321"),
               'is_admin'=> false,
               'address' => 'Madrid 3032 Habanero street',
               'phone' => '+34 654 543 543',
               'email' => 'te3st@example.com',
           ]);

        \App\Models\Service::create([
            'id' => 1,
            'title' => 'Cleaning',
            'description' => 'Painless',

        ]);

        \App\Models\Service::create([
            'id' => 2,
            'title' => 'Drilling',
            'description' => 'Effective',
        ]);

        \App\Models\Service::create([
            'id' => 3,
            'title' => 'Root canal treatment',
            'description' => 'Using a microscope',
        ]);

        \App\Models\Service::create([
            'id' => 4,
            'title' => 'Tooth poisoning',
            'description' => 'Before root canal treatment',
        ]);

        \App\Models\Service::create([
            'id' => 5,
            'title' => 'Tartar cleaning',
            'description' => 'Anaesthetic used',
        ]);

        \App\Models\Service::create([
            'id' => 6,
            'title' => 'fsafsafsa',
            'description' => 'mkfsaklfmklsakmfksalkfksalk',
        ]);

        \App\Models\Service::create([
            'id' => 7,
            'title' => 'fkmsamklfklsakmlfklsakfklsma',
            'description' => 'fkmasmofwabeiuwoandkmp;;msaljfnsakjlcm;lsa',
        ]);


        \App\Models\Service::create([
            'id' => 8,
            'title' => 'dsadsa',
            'description' => 'Anaesthedsadsadsadastic used',
        ]);

        \App\Models\Service::create([
            'id' => 9,
            'title' => 'Tartar cdsadsaleaning',
            'description' => 'Anaesthedsadsadsadsadtic used',
        ]);

        \App\Models\Appointment::create([
            'service_id' => 1,
             'user_id' => 3,
             'isApproved'=>0,

             'appointment_date' => '2020-01-01 14:00:00',
        ]);
        \App\Models\Appointment::create([
                'service_id' => 2,
            'user_id' => 2,
            'isApproved'=>0,
            'appointment_date' => '2020-01-01 12:00:00',
        ]);


    }
}
