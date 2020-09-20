<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    public function run()
    {
        $userRoles = User::getRoles();
        foreach ($userRoles as $title){
            Role::create([
                'title' => $title
            ]);
        }
    }
}
