<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    public $timestamps = false;

    protected $dates = ['when'];

    protected $fillable = ['post_id','repeat','when','to'];
}
