<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    public $timestamps = false;

    public $primaryKey = 'id';

    protected $dates = ['when'];

    protected $fillable = ['post_id','repeat','when','to'];
}
