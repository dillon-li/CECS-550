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

  public static $categories = [
    [
      'id' => 1,
      'name' => 'Headgear',
      'pic' => '/images/categories/cap.jpg'
    ],
    [
      'id' => 2,
      'name' => 'Pants',
      'pic' => '/images/categories/pants2.jpg'
    ],
    [
      'id' => 3,
      'name' => 'Shirts',
      'pic' => '/images/categories/tees.jpg'
    ],
    [
      'id' =>4,
      'name' => 'Footwear',
      'pic' => '/images/categories/footware1.jpg'
    ],
    [
      'id' => 5,
      'name' => "Miscellaneous",
      'pic' => '/images/categories/tees7.jpg'
    ]
  ];

}
