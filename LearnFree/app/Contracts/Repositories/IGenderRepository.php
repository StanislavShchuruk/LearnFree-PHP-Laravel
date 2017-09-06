<?php

namespace App\Contracts\Repositories;

/**
 *
 * @author Stanis
 */
interface IGenderRepository {
    public function getGenderId(string $name);
}
