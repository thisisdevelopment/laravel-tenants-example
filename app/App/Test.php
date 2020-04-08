<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use ThisIsDevelopment\LaravelTenants\Traits\OnTenantDB;

class Test extends Model
{
    use OnTenantDB;

    protected $fillable = [
        'name',
    ];
}
