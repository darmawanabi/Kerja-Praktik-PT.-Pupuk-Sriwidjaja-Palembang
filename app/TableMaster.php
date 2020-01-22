<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableMaster extends Model
{
    //
    protected $fillable = [
         'jenis_kontrak'
    ];

    public function kontrak(){
        return $this->hasMany(Post::class)->whereNull('parent_id');
    }

}
