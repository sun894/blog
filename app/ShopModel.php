<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopModel extends Model
{
    protected $table = 'shop_goods';
    protected $primaryKey = 'shop_id';
    public $timestamps = false;
    protected $guarded = [];

}
