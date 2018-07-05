<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    protected $guarded = ['id'];
    public static function storeMail(array $data)
    {
        return self::forceCreate($data);
    }
}
