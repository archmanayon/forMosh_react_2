<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        User::factory(1)->create([
            'name' => 'mananap',
            'email' => 'man@nan.app',
            'password' => Hash::make('secret')
        ]);

        User::factory(1)->create([
            'name' => 'Clod Malinao',
            'email' => 'clod@ecp.co',
            'password' => Hash::make('secret')
        ]);


        // \App\Models\Royalty::factory(10)->create();
        // or you may call this way
        // $this->call(Royalty::class);
    }
}
