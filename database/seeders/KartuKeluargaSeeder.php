<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KartuKeluarga;
use App\Models\Penduduk;

class KartuKeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Buat beberapa Kartu Keluarga
        $kks = [
            [
                'nomor_kk' => '1234567890123456',
                'kepala_keluarga' => 'Budi Santoso',
                'alamat' => 'Jl. Merdeka No. 1',
            ],
            [
                'nomor_kk' => '9876543210987654',
                'kepala_keluarga' => 'Siti Aminah',
                'alamat' => 'Jl. Sudirman No. 2',
            ],
        ];

        foreach ($kks as $kk) {
            $createdKK = KartuKeluarga::create($kk);

            // Tambahkan Penduduk untuk setiap KK
            Penduduk::create([
                'kartu_keluarga_id' => $createdKK->id,
                'nik' => rand(1000000000000000, 9999999999999999),
                'nama' => 'Andi Pratama',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1995-05-10',
                'jenis_kelamin' => 'Laki-laki',
                'agama' => 'Islam',
                'pekerjaan' => 'Karyawan Swasta',
            ]);

            Penduduk::create([
                'kartu_keluarga_id' => $createdKK->id,
                'nik' => rand(1000000000000000, 9999999999999999),
                'nama' => 'Rina Kusuma',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1998-08-15',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 'Kristen',
                'pekerjaan' => 'Mahasiswa',
            ]);
        }
    }
}
