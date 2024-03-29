<?php

namespace CECS550;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     /*
    protected $fillable = [
        'name', 'username', 'email', 'password', 'confirm_code', 'gender', 'stripe_token', 'stripe_id'
    ];
    */

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function address()
    {
      return $this->hasMany('Address', 'userID');
    }

    public function orders()
    {
      return $this->hasMany('orders');
    }
}
