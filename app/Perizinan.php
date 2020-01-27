<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perizinan extends Model
{
    protected $date = ['deleted_at'];

    protected $fillable = ['uuid','user_id','post_id','parent_id','file','keterangan','created_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
