<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::all()->sortBy('id');
        return view('admin.categories.index', ['categories' => $data]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'bail|required|unique:categories',
            'description' => 'required'
        ]);
        Category::storeCategory(['name' => $request->name, 'description' => $request->description]);
        return redirect()->route('admin.categories.index');
    }

    public function edit($id)
    {
        $data = Category::find($id);
        return view('admin.categories.edit', ['category' => $data]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'bail|required|unique:categories,name,'.$id,
            'description' => 'required'
        ]);
        Category::find($id)->update($request->all());
        return redirect()->route('admin.categories.index');
    }

    public function delete($id)
    {
        Category::destroy($id);
        return redirect()->route('admin.categories.index');
    }
}
