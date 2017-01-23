<?php

namespace CECS550;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';

    public $guarded = [];
    public $timestamps = false;

    public function User()
    {
      return $this->belongsTo('User');
    }
}
