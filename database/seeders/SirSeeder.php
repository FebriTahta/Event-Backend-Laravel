<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use App\Models\User;

class SirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usr = [
            [
                'username' => "admin",
                // 'email'=> "sir@peternak.com",
                'role' => "super_admin",
                'password'   => bcrypt("peternaklele"),
                'pass' => "peternaklele",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],

        ];
        // \DB::table('users')->insert($usr);
        User::insert($usr);

    }
}
