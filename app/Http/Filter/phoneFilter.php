<?php

namespace App\Http\Filter;

use Illuminate\Database\Eloquent\Builder;

class phoneFilter extends abstractFilter
{
    public const NAME ='name';
    public const PHONE ='phoneBaseViews';
    public const ADDRESS ='address';
    public const BIRTHDATE ='birthday';
    public const COUNTRY ='country';
    public const CATEGORY_ID ='category_id';
    public const TAGS ='tags';

    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::PHONE => [$this, 'phone'],
            self::ADDRESS => [$this, 'address'],
            self::BIRTHDATE => [$this, 'birthdate'],
            self::COUNTRY => [$this, 'country'],
            self::CATEGORY_ID => [$this, 'categoryId'],
            self::TAGS => [$this, 'tags'],
        ];
    }

    public function name(Builder $builder, $value) {
        $builder->where('name', 'like', "%{$value}%");
    }
    public function phone(Builder $builder, $value) {
        $builder->where('phone', 'like', "%{$value}%");
    }
    public function address(Builder $builder, $value) {
        $builder->where('address', 'like', "%{$value}%");
    }
    public function birthday(Builder $builder, $value) {
        $builder->where('birthday', 'like', "%{$value}%");
    }public function country(Builder $builder, $value) {
        $builder->where('country', 'like', "%{$value}%");
    }public function categoryId(Builder $builder, $value) {
        $builder->where('category_id', 'like', "%{$value}%");
    }public function tag(Builder $builder, $value) {
        $builder->where('tag', 'like', "%{$value}%");
    }
}
