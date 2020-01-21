<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $dates = ['when'];

    protected $fillable = ['post_id','name','repeat','when','to'];
}
