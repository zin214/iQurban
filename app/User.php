<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Timestamp;

class User extends Authenticatable
{
    use Notifiable, Timestamp;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

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

    protected $attributes = [
        'picture' => 'configuration/profile.png',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function getPictureUrlAttribute(){

        return asset($this->picture);

    }

    public function getUsernameDisplayAttribute(){

        return ucfirst($this->username);
    }

    public function getNameAttribute($value){

        return ucfirst($value);

    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }
}
