<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $primaryKey = 'id';

    protected $fillable = ['jenis','uuid','user_id','table_master_id','parent_id','nama','file','kategori','tanggal_berakhir','keterangan'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function contracts(){
        return $this->hasMany(Contract::class)->whereNull('parent_id');
    }

    public function perizinan(){
        return $this->hasMany(Perizinan::class)->whereNull('parent_id');
    }

    public function logs(){
        return $this->hasMany(Log::class)->whereNull('parent_id');
    }
}
