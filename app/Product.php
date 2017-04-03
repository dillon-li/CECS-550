<?php

namespace CECS550;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $table = 'products';

  public $guarded = [];
  public $timestamps = false;

  public function Sku()
  {
    return $this->hasMany('Sku', 'sku_id');
  }

}
