<?php

namespace App\Contracts\Repositories;

/**
 *
 * @author Stanis
 */
interface ILocationRepository {
    public function getCountries();
    public function getRegions($country_id);
    public function getCities($region_id);
}
