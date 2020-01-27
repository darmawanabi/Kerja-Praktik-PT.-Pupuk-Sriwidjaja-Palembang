<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = ['uuid','user_id','post_id','parent_id','file','keterangan','created_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
