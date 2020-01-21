<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perizinan extends Model
{
    use SoftDeletes;

    protected $date = ['deleted_at'];

    protected $fillable = ['uuid','user_id','post_perizinan_id','parent_id','file','keterangan','created_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
