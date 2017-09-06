<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;

use DateTime;
use App\Models\User;
use App\Contracts\Repositories\IUserRepository;

/**
 * Description of UserRepository
 *
 * @author Stanis
 */
class UserRepository implements IUserRepository
{
    public function create(string $nickname, string $email, string $password)
    {
        return User::create([
            'nickname' => $nickname,
            'email' => $email,
            'password' => bcrypt($password),
            'show_name_id' => DB::table('show_name_types')->where('name', 'nickname')
                                                          ->first()->id
        ]);
    }
    
    public function update($id, $nickname, $showNameId, $name = null, 
                            $surname = null, DateTime $dateOfBirth = null, 
                            $genderId = null, $countryId = null, $regionId = null,
                            $cityId = null, $aboutMe = null)
    {
        User::where('id', $id)
            ->update([
            'nickname' => $nickname,
            'name' => $name,
            'surname' => $surname,
            'date_of_birth' => $dateOfBirth,
            'gender_id' => $genderId,
            'country_id' => $countryId,
            'region_id' => $regionId,
            'city_id' => $cityId,
            'show_name_id' => $showNameId,
            'about_me' => $aboutMe
        ]);
    }
}
