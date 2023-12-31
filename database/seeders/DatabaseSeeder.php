<?php

namespace Database\Seeders;

use App\Models\Acara;
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
        \App\Models\User::factory()->create();
        \App\Models\Admin::factory()->create();

        Acara::create(
            [
                'nama_acara' => 'Pernikahan',
            ]
        );

        // Acara::create(
        //     [
        //         'nama_acara' => 'Khitanan',
        //     ]
        // );
    }
}
