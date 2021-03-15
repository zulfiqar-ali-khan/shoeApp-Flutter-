<?php

use Illuminate\Database\Seeder;
use App\User;
class AuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::truncate();
        $row = new User();
        $row->name = "Sixer";
        // $row->phone = "12345678";
        $row->email = "admin@sixer.com";
        $row->password = bcrypt("sixer1234");
        $row->save();
    }
}
