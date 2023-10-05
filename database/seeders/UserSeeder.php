<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name'=>'TeamLeader', 'email'=> 'TeamLeader@testmail.com', 'role'=>'Teamleader', 'password'=>Hash::make('123456789')],
            ['name'=>'Editor', 'email'=> 'Editor@testmail.com', 'role'=>'Editor','password'=>Hash::make('123456789')],
            ['name'=>'Viewer', 'email'=> 'Viewer@testmail.com', 'role'=>'Viewer','password'=>Hash::make('123456789') ],
            ['name'=>'TeamLeader', 'email'=> 'TeamLeader2@testmail.com', 'role'=>'Teamleader', 'password'=>Hash::make('123456789')],
            ['name'=>'Editor', 'email'=> 'Editor2@testmail.com', 'role'=>'Editor','password'=>Hash::make('123456789')],
            ['name'=>'Viewer', 'email'=> 'Viewer3@testmail.com', 'role'=>'Viewer','password'=>Hash::make('123456789') ]
        ];
        foreach ($users as $user) {
            User::create($user);
        }

    }

}
