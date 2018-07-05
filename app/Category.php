<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];
    public static function storeCategory(array $data)
    {
        return self::forceCreate($data);
    }
}
