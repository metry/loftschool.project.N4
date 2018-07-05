<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

    public static function storeProduct(array $data)
    {
        return self::forceCreate($data);
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

    public static function searchProducts($request, $countOnPage)
    {
        return Product::where('name', 'LIKE', "%". $request ."%")
            ->orWhere('description', 'LIKE', "%". $request ."%")
            ->orderBy('id', 'desc')
            ->paginate($countOnPage);
    }
}
