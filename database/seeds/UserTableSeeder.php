<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        factory(User::class, 50)->create();

        $userRoles = User::getRoles();
        foreach ($userRoles as $id => $role){
            factory(User::class)->create([
                'nickname' => $role,
                'email' => mb_strtolower("$role@local.com"),
                'email_verified_at' => now(),
                'role_id' => $id,
            ]);
        }
    }
}
