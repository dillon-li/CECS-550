<?php

namespace CECS550;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
  protected $table = 'carts';

  public $guarded = [];
  public $timestamps = false;

  public function User()
  {
    return $this->belongsTo('User', 'userID');
  }

  public function Sku()
  {
    return $this->hasMany('Sku', 'sku_id');
  }

}
