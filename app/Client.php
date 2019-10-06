<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Client extends Model
{
    use HasRoles;

    protected $guard_name = 'web'; // or whatever guard you want to use

    protected $fillable = [
        'name', 'email', 'address',
    ];
}
