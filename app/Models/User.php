<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function wishlist() {
        return $this->hasMany(Wishlist::class);
    }

    public function isAdmin() {
        if(Auth::user()->usertype=='superadmin') {
            return true;
        }
        else {
            return false;
        }
    }

    public function isContractor() {
        if(Auth::user()->usertype=='contractor') {
            return true;
        }
        else {
            return false;
        }
    }

    public function isBuyer() {
        if(Auth::user()->usertype=='buyer') {
            return true;
        }
        else {
            return false;
        }
    }
}
