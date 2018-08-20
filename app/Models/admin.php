<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    //
    public $timestamps = false;
    protected $table='admin';
    protected $fillable=['name','pass','time','lasttime','count','status'];
}
