<?php

namespace App\Repositories;

use DB;
use App\Contracts\Repositories\ILocationRepository;

/**
 * Description of LocationRepository
 *
 * @author Stanis
 */
class LocationRepository implements ILocationRepository {

    public function getCountries() {
        return DB::table('country')->get();
    }

    public function getRegions($country_id) {
        return DB::table('region')->where('country_id', $country_id)->get();
    }
    
    public function getCities($region_id) {
        return DB::table('city')->where('region_id', $region_id)->get();
    }

}

