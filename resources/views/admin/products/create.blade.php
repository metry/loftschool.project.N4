@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Create product</h1>
        <form action="{{route('admin.products.store')}}" enctype="multipart/form-data" method="post">
            {{csrf_field()}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" id="category_id" name="category_id">
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">Product name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
            </div>
            <div class="form-group">
                <label for="description">Product description</label>
                <textarea class="form-control" id="description" rows="3" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="price">Product price, RUR</label>
                <input type="number" min="0" step="0.01" class="form-control" id="price" name="price">
            </div>
            <div class="form-group">
                <label for="img">Product image</label>
                <input type="file" class="form-control-file" id="img" name="img">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection