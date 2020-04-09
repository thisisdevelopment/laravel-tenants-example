<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use ThisIsDevelopment\LaravelTenants\Contracts\Tenant;
use ThisIsDevelopment\LaravelTenants\Traits\ProvidesTenant;

class Customer extends Model implements Tenant
{
    use ProvidesTenant;

    protected $fillable = [
        'name',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'customer_users', 'customer_id', 'user_id');
    }
}
