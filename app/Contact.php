<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'companyName', 'firstName', 'lastName', 'street', 'postalCode', 'city', 'country', 'vatNumber', 'bankNumber', 'email', 'phone'
    ];
}
