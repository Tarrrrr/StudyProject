<?php

namespace App\Http\Filter;

use Illuminate\Database\Eloquent\Builder;

class phoneFilter extends abstractFilter
{
    public const NAME ='name';
    public const PHONE ='phoneBaseViews';
    public const ADDRESS ='address';
    public const BIRTHDAY ='birthday';
    public const COUNTRY ='country';
    public const CATEGORY_ID ='category_id';
    public const TAG_ID ='tag_id';

    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::PHONE => [$this, 'phone'],
            self::ADDRESS => [$this, 'address'],
            self::BIRTHDAY => [$this, 'birthday'],
            self::COUNTRY => [$this, 'country'],
            self::CATEGORY_ID => [$this, 'categoryId'],
            self::TAG_ID => [$this, 'tagsId'],
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
    }public function tagId(Builder $builder, $value) {
        $builder->where('tag_id', 'like', "%{$value}%");
    }
}
