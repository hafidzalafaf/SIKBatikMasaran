<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $table= 'pengeluaran';
    protected $guarded = [];

    // convert waktu
    public function getTanggalAttribute()
    {
        return Carbon::parse($this->attributes['tanggal'])
        ->locale('id')->isoFormat('DD-MM-YYYY');
    }
}
