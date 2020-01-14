<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Use_login extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'u_id';
    public $timestamps = false;
    protected $guarded = [];

}
