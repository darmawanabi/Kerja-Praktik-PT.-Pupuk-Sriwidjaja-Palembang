<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = ['user_id','post_id','parent_id','file','keterangan'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
