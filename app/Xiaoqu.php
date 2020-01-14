<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Xiaoqu extends Model
{
    protected $table = 'qu';
    protected $primaryKey = 'qu_id';
    public $timestamps = false;
    protected $guarded = [];

}
