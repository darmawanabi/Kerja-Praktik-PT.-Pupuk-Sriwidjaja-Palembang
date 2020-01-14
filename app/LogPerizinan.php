<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LogPerizinan extends Model
{
    protected $dates = ['deleted_at'];

    protected $fillable = ['user_id','post_perizinan_id','parent_id','file','keterangan'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
