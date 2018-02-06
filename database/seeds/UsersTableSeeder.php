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
        factory(App\User::class)->create([
            'name' => 'Heisenberg',
            'email' => 'heisenberg@breakingbad.com',
            'password' => password_hash('crystal_meth', PASSWORD_BCRYPT)
        ]);
        factory(App\User::class)->create([
            'name' => 'Jesse Pinkman',
            'email' => 'jesse@breakingbad.com',
            'password' => password_hash('chilli_powder', PASSWORD_BCRYPT)
        ]);
    }
}
