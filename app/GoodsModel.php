<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodsModel extends Model
{
    protected $table = 'goods_shop';
    protected $primaryKey = 'goods_id';
    public $timestamps = false;
    protected $guarded = [];

}
