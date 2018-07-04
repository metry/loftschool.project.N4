<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];
    public static function storeProduct(array $data)
    {
        $product = new Product();
        $product->category_id = $data['category_id'];
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->img = $data['img'];
        return $product->save();
    }

    public static function updateProduct(array $data)
    {
        $product = Product::find($data['id']);
        $product->category_id = $data['category_id'];
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->img = $data['img'];
        return $product->save();
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
