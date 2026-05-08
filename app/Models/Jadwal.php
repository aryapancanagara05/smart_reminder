<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $fillable = ['judul_kegiatan', 'catatan', 'waktu', 'satuan_waktu', 'tingkat_kepentingan', 'status'];
}
