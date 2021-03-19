<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Phone;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'email','mobile', 'password','expire','age'
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

    public function scopeExpire($query){
        return $query -> where('expire', 0);
    }
    public function scopeEmail($query){
        return $query -> pluck('email')->toArray();
    }
    public function ScopeSelection($query){
        return $query -> select('id','name', 'email','mobile', 'password','expire','age');
    }
    public function phone(){
        return $this -> hasOne(Phone::class, 'user_id');
    }
}
