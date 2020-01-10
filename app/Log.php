<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Log extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['user_id','post_id','parent_id','file','keterangan'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
