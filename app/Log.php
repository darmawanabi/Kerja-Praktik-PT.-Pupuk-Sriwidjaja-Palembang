<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = ['jenis','user_id','post_id','parent_id','file','keterangan'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
