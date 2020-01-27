<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableMaster extends Model
{
    public $timestamps = false;

    protected $fillable = [
         'jenis',
         'nama'
    ];

    public function kontrak(){
        return $this->hasMany(Post::class)->whereNull('parent_id');
    }

    public function perizinan(){
        return $this->hasMany(Post::class)->whereNull('parent_id');
    }

}
