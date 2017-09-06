<?php

namespace App\Repositories;

use Debugbar;
use DB;
use App\Contracts\Repositories\IShowNameTypeRepository;

/**
 * Description of UserRepository
 *
 * @author Stanis
 */
class ShowNameTypeRepository implements IShowNameTypeRepository
{
    public function getShowNameTypeId(string $name) {
        return DB::table('show_name_types')->where('name', $name)->first()->id;
    }
}

