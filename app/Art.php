<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
    protected $table = 'articles'; 
	protected $primaryKey = 'article_id';
	public $timestamps = false;
	protected $guarded = [];
}
