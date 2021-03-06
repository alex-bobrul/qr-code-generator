<?php

namespace Database\Seeders;

use App\Models\QrCode;
use App\Models\User;
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
         User::factory(10)->has(QrCode::factory(5))->create();
    }
}
