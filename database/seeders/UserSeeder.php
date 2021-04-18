<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u = new User();
        $u->name = "Sam Bloggs";
        $u->email = "sam@bloggs.com";
        $u->password = bcrypt("secret");
        $u->save();
    }
}
