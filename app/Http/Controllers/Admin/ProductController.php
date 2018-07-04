<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Classes\ImageHandler;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    const PRODUCTS_UPLOAD_DIRECTORY = 'products';
    const IMAGE_WIDTH = 616;

    public function index()
    {
        $data = Product::with('category')->orderBy('id', 'desc')->get();
        return view('admin.products.index', ['products' => $data]);
    }

    public function create()
    {
        $data = Category::all()->sortBy('id');
        return view('admin.products.create', ['categories' => $data]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'bail|required|exists:categories,id',
            'name' => 'required',
            'description' => 'required',
            'price' => 'bail|required|regex:/^\d{0,6}(\.\d{1,2})?$/',
            'img' => 'bail|required|image|mimes:jpeg,jpg,png'
        ]);

        Product::storeProduct([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'img' => ImageHandler::saveImage(
                    $request->file('img'),
                    md5(microtime()),
                    self::PRODUCTS_UPLOAD_DIRECTORY,
                    self::IMAGE_WIDTH
                )
        ]);
        return redirect()->route('admin.products.index');
    }

    public function edit($id)
    {
        $data['product'] = Product::find($id);
        $data['categories'] = Category::all()->sortBy('id');
        return view('admin.products.edit', $data);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'category_id' => 'bail|required|exists:categories,id',
            'name' => 'required',
            'description' => 'required',
            'price' => 'bail|required|regex:/^\d{0,6}(\.\d{1,2})?$/',
            'img' => 'bail|nullable|image|mimes:jpeg,jpg,png'
        ]);

        $image = ($request->file('img')) ?
            ImageHandler::saveImage(
                $request->file('img'),
                md5(microtime()),
                self::PRODUCTS_UPLOAD_DIRECTORY,
                self::IMAGE_WIDTH
            ) : Product::find($id)->img;

        Product::updateProduct([
            'id' => $id,
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'img' => $image
        ]);

        return redirect()->route('admin.products.index');
    }

    public function delete($id)
    {
        Product::destroy($id);
        return redirect()->route('admin.products.index');
    }

    public function listing($category_id)
    {
        $data = Product::where('category_id', $category_id)->with('category')->get();
        return view('admin.products.index', ['products' => $data]);
    }
}
