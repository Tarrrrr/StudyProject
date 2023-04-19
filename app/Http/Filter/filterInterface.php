<?php

namespace App\Http\Filter;

use Illuminate\Database\Eloquent\Builder;

interface filterInterface
{
    public function apply(Builder $builder);
}
