<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yuan extends Model
{
    protected $table = 'yuangong';
    protected $primaryKey = 'y_id';
    public $timestamps = false;
    protected $guarded = [];
    
}
