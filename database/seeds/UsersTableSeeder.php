<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(\App\Models\User::class)->times(50)->make();
        \App\Models\User::insert($users->toArray());

        $user = \App\Models\User::find(1);
        $user->name = 'Aufree';
        $user->email = 'aufree@estgroupe.com';
        $user->is_admin = true;
        $user->password = bcrypt('password');
        $user->save();
    }
}
