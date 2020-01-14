<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cl extends Model
{
    protected $table = 'shop_type';
    protected $primaryKey = 't_id';
	public $timestamps = false;
	protected $guarded = [] ;
}
