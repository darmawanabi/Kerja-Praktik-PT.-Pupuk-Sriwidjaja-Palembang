<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    //
    protected $fillable = [
        'nama', 'jenis_kelamin', 'alamat', 'user_id',
    ];
}
