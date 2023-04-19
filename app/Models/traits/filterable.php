<?php

namespace App\Models\traits;

use App\Http\Filter\filterInterface;
use Illuminate\Database\Eloquent\Builder;

trait filterable
{
    /**
     * @param Builder $builder
     * @param filterInterface $filter
     *
     * @return Builder
     */
    public function scopeFilter(Builder $builder, filterInterface $filter)
    {
        $filter->apply($builder);
        return $builder;
    }
}
