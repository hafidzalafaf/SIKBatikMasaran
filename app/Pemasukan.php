<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Pemasukan extends Model
{
    protected $table= 'pemasukan';
    protected $guarded = [];

    // convert waktu
    public function getTanggalAttribute()
    {
        return Carbon::parse($this->attributes['tanggal'])
        ->locale('id')->isoFormat('DD-MM-YYYY');
    }

}
