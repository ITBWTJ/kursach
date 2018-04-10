<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('phone', '380939696243')->first();

        if(empty($user)) {
            User::create([
                'first_name' => 'Ivan',
                'last_name' => 'Lev',
                'phone' => '+380939696243',
                'password' => bcrypt('11111111'),
                'is_admin' => true
            ]);
        }
    }
}
