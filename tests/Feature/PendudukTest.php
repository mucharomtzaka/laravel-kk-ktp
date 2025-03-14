<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Penduduk;

class PendudukTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function dapat_menampilkan_daftar_penduduk()
    {
       // Membuat 3 data penduduk dummy
        Penduduk::factory()->count(3)->create();

        // Panggil API GET /api/penduduk
        $response = $this->getJson('/api/penduduk');

        // Pastikan response statusnya 200
        $response->assertStatus(200);

        // Pastikan jumlah data yang dikembalikan adalah 3
        $response->assertJsonCount(3, 'data');
    }

    /** @test */
    public function dapat_membuat_penduduk()
    {
        $kartuKeluarga = \App\Models\KartuKeluarga::factory()->create();

        $data = [
            'kartu_keluarga_id' => $kartuKeluarga->id,
            'nik' => '3201234567890001',
            'nama' => 'John Doe',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '1990-01-01',
            'jenis_kelamin' => 'Laki-laki',
            'agama' => 'Islam',
            'pekerjaan' => 'Programmer',
        ];

        $response = $this->postJson('/api/penduduk', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment(['nama' => 'John Doe']);
    }

    /** @test */
    public function dapat_melihat_detail_penduduk()
    {
        $penduduk = Penduduk::factory()->create();

        $response = $this->getJson("/api/penduduk/{$penduduk->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['nama' => $penduduk->nama]);
    }

    /** @test */
    public function dapat_memperbarui_penduduk()
    {
        $kartuKeluarga = \App\Models\KartuKeluarga::factory()->create();
        $penduduk = \App\Models\Penduduk::factory()->create([
            'kartu_keluarga_id' => $kartuKeluarga->id,
            'nik' => '3201234567890001',
        ]);

        $dataUpdate = [
            'kartu_keluarga_id' => $kartuKeluarga->id,
            'nik' => '3201234567890002', // NIK harus unik
            'nama' => 'Jane Doe',
            'tempat_lahir' => 'Bandung',
            'tanggal_lahir' => '1995-05-10',
            'jenis_kelamin' => 'Perempuan',
            'agama' => 'Kristen',
            'pekerjaan' => 'Dokter',
        ];

        $response = $this->putJson("/api/penduduk/{$penduduk->id}", $dataUpdate);

        $response->assertStatus(200)
                 ->assertJsonFragment(['nama' => 'Jane Doe']);

    }

    /** @test */
    public function dapat_menghapus_penduduk()
    {
        $penduduk = Penduduk::factory()->create();

        $response = $this->deleteJson("/api/penduduk/{$penduduk->id}");

        $response->assertStatus(200);

    }
}
