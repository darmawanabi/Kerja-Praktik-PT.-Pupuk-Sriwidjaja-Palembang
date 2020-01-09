<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['uuid','nama','file','keterangan'];

    public function contracts(){
        return $this->hasMany(Contract::class)->whereNull('parent_id');
    }
}
