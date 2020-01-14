<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommontModel extends Model
{
    protected $table = 'commont';
    protected $primaryKey = 'commont_id';
	public $timestamps = false;
	protected $guarded = [] ;
}
