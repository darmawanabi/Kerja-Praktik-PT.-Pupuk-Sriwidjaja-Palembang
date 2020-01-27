<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostPerizinan extends Model
{
    protected $fillable = ['uuid','user_id','table_master_id','parent_id','nama','file','keterangan','kategori','tanggal_berakhir','created_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function perizinan(){
        return $this->hasMany(Perizinan::class)->whereNull('parent_id');
    }

    public function logs(){
        return $this->hasMany(LogPerizinan::class)->whereNull('parent_id');
    }
}
