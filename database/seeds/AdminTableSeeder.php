<?php

declare(strict_types=1);

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create(
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => now(),
                'password' => bcrypt('123123'),
                'remember_token' => Str::random(10),
            ]
        );

        factory(Admin::class, 10)->create()->each(function ($admin) {
        });
    }
}
