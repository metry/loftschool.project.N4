<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];
    public static function storeCategory(array $data)
    {
        $category = new Category();
        $category->name = $data['name'];
        $category->description = $data['description'];
        return $category->save();
    }
}
