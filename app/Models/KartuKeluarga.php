<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    //
    use HasFactory;

    protected $table = 'kartu_keluargas';

    protected $fillable = ['nomor_kk', 'kepala_keluarga', 'alamat'];

    public function penduduks()
    {
        return $this->hasMany(Penduduk::class);
    }

}
