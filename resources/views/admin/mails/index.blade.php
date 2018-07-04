@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Addresses to which emails come</h1>
        <a href="{{route('admin.mails.create')}}" class="btn btn-link">Create email address</a>
        <table class="table table-bordered">
            <tr>
                <td>ID</td>
                <td>Email</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
            @foreach($mails as $mail)
                <tr>
                    <td>{{$mail->id}}</td>
                    <td>{{$mail->email}}</td>
                    <td><a class="btn btn-default" href="{{route('admin.mails.edit', ['id' => $mail->id])}}">Edit</a></td>
                    <td><a class="btn btn-danger" href="{{route('admin.mails.delete', ['id' => $mail->id])}}">Delete</a></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection