<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'user_login';
    protected $primaryKey = 'user_id';
    public $timestamps = false;
    protected $guarded = [];

}
