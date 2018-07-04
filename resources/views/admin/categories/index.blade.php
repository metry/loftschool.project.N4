@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Categories</h1>
        <a href="{{route('admin.categories.create')}}" class="btn btn-link">Create category</a>
        <table class="table table-bordered">
            <tr>
                <td>Show products</td>
                <td>Category ID</td>
                <td>Name</td>
                <td>Description</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
            @foreach($categories as $category)
                <tr>
                    <td><a class="btn btn-default" href="{{route('admin.products.listing', ['category_id' => $category->id])}}">Show</a></td>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->description}}</td>
                    <td><a class="btn btn-default" href="{{route('admin.categories.edit', ['id' => $category->id])}}">Edit</a></td>
                    <td><a class="btn btn-danger" href="{{route('admin.categories.delete', ['id' => $category->id])}}">Delete</a></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection