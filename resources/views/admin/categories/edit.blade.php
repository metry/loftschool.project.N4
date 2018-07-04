@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Edit category</h1>
        <form action="{{route('admin.categories.update', ['id' => $category->id])}}" method="post">
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
                <label for="name">Category name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{$category->name}}">
            </div>
            <div class="form-group">
                <label for="description">Category description</label>
                <textarea class="form-control" id="description" rows="3" name="description">{{$category->description}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection