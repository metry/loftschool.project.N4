<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index()
    {
        $data = Mail::orderBy('id', 'desc')->get();
        return view('admin.mails.index', ['mails' => $data]);
    }

    public function create()
    {
        return view('admin.mails.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'bail|required|email',
        ]);

        Mail::storeMail([
            'email' => $request->email
        ]);
        return redirect()->route('admin.mails.index');
    }

    public function edit($id)
    {
        $data = Mail::find($id);
        return view('admin.mails.edit', ['mail' => $data]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'email' => 'bail|required|email|unique:mails,email,'.$id
        ]);
        Mail::find($id)->update($request->all());
        return redirect()->route('admin.mails.index');
    }

    public function delete($id)
    {
        Mail::destroy($id);
        return redirect()->route('admin.mails.index');
    }
}
