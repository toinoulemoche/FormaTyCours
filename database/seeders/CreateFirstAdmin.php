<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateFirstAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'adminlocal',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'image_user' => 'https://lh3.googleusercontent.com/proxy/tSaEUOa1Y0FsWUy-mSjUaIxxHhEs1XdF_YNR_yohrBfSvHkPly5n583I8B5bDHM-LrSU9RembHr09Dv6LYn6gZcwayYRZtAT3Ux4Nj0RZtON8sbL',
            'admins' => 1
        ]);
    }
}
