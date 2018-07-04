@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Products</h1>
        <a href="{{route('admin.products.create')}}" class="btn btn-link">Create product</a>
        <table class="table table-bordered">
            <tr>
                <td>Product ID</td>
                <td>Category</td>
                <td>Name</td>
                <td>Description</td>
                <td>Price</td>
                <td>Image</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td><img src="/upload/products/{{$product->img}}" alt="" width="72"></td>
                    <td><a class="btn btn-default" href="{{route('admin.products.edit', ['id' => $product->id])}}">Edit</a></td>
                    <td><a class="btn btn-danger" href="{{route('admin.products.delete', ['id' => $product->id])}}">Delete</a></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection