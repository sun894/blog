<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
{
    protected $table = 'news'; 
	protected $primaryKey = 'news_id';
	public $timestamps = false;
	protected $guarded = [];
}
