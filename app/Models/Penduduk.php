<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penduduk extends Model
{
    //
    use HasFactory;

    protected $table = 'penduduks';

    protected $fillable = [
        'kartu_keluarga_id', 'nik', 'nama', 'tempat_lahir',
        'tanggal_lahir', 'jenis_kelamin', 'agama', 'pekerjaan'
    ];

    public function kartuKeluarga()
    {
        return $this->belongsTo(KartuKeluarga::class);
    }
}
