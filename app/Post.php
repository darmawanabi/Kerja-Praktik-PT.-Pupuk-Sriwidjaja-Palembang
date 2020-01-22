<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['uuid','user_id','table_master_id','parent_id','nama','jenis','file','keterangan'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function contracts(){
        return $this->hasMany(Contract::class)->whereNull('parent_id');
    }

    public function logs(){
        return $this->hasMany(Log::class)->whereNull('parent_id');
    }
}
