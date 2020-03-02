<?php
declare(strict_types=1);

namespace App\Repositories;


use Illuminate\Database\Eloquent\Collection;

interface CountryRepositoryInterface
{
    public function findAll() :?Collection;
}
