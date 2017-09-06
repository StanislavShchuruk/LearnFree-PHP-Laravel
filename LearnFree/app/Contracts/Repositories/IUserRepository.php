<?php

namespace App\Contracts\Repositories;

use DateTime;

interface IUserRepository 
{
    public function create(string $nickname, string $email, string $password);
    
    public function update($id, $nickname, $showNameId, $name = null, 
                            $surname = null, DateTime $dateOfBirth = null, 
                            $genderId = null, $countryId = null, $regionId = null,
                            $cityId = null, $aboutMe = '');
}

