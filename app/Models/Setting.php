<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['company_name', 'company_email', 'phone_no', 'address', 'logo'];

      public static function getSetting(string $name)
    {
        return Setting::first();
    }
}
