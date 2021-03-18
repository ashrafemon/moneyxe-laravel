<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Model\UserInfo;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'role' => 'admin'
        ]);

        if($admin){
            UserInfo::create([
                'user_id' => $admin->id
            ]);
        }

        $client = User::create([
            'name' => 'Client',
            'email' => 'client@client.com',
            'password' => Hash::make('client')
        ]);

        if($client){
            UserInfo::create([
                'user_id' => $client->id
            ]);
        }
    }
}
