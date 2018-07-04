@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Edit email address</h1>
        <form action="{{route('admin.mails.update', ['id' => $mail->id])}}" method="post">
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
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$mail->email}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection