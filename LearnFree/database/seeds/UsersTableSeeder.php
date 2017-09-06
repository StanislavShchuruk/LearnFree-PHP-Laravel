<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        
        User::create([
                    'nickname' => 'Stas',
                    'email' => 'stas@email.ua',
                    'password' => bcrypt('qwerty'),
                    'show_name_id' => DB::table('show_name_types')->where('name', 'nickname')
                                                                  ->first()->id
            ]);
    }

}

?>