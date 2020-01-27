<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableMasterPerizinan extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'jenis_perizinan'
   ];

   public function perizinan(){
       return $this->hasMany(PostPerizinan::class)->whereNull('parent_id');
   }

}
