<?php

namespace App\Repositories;

use Debugbar;
use DB;
use App\Contracts\Repositories\IGenderRepository;

/**
 * Description of GenderRepository
 *
 * @author Stanis
 */
class GenderRepository implements IGenderRepository {
   
    public function getGenderId(string $name) {
        return DB::table('genders')->where('name', $name)->first()->id;
    }

}
