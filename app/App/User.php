<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use ThisIsDevelopment\LaravelTenants\Contracts\TenantAuth;
use ThisIsDevelopment\LaravelTenants\Traits\ProvidesTenantAuth;

class User extends Authenticatable implements TenantAuth
{
    use Notifiable;
    use ProvidesTenantAuth;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAllowedTenants(): ?Collection
    {
        return $this->customers()->get();
    }

    public function getDefaultTenant()
    {
        return $this->getAllowedTenants()->first()->id;
    }

    public function customers(): BelongsToMany
    {
        return $this->belongsToMany(Customer::class, 'customer_users', 'user_id', 'customer_id');
    }

    public function scopeTenant(Builder $query, Customer $tenant): void
    {
        $query->whereIn($this->getKeyName(), $tenant->users()->get()->pluck('id')->all());
    }
}
