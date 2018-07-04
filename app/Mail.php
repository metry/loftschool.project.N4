<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    protected $guarded = ['id'];
    public static function storeMail(array $data)
    {
        $mail = new Mail();
        $mail->email = $data['email'];
        return $mail->save();
    }
}
