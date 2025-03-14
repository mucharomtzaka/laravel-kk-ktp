<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\KartuKeluarga;

class KartuKeluargaTest extends TestCase
{

    use RefreshDatabase; // Membersihkan database setelah setiap test

     /** @test */
     public function dapat_membuat_kartu_keluarga()
     {
        $data = [
            'nomor_kk' => '1234567890123456',
            'kepala_keluarga' => 'Budi Santoso',
            'alamat' => 'Jl. Merdeka No. 1',
        ];

        $response = $this->postJson('/api/kartu_keluarga', $data);

        // Tambahkan ini untuk debugging
        $response->dump();

        $response->assertStatus(201)
                 ->assertJson([
                     'message' => 'Kartu Keluarga berhasil dibuat'
                 ]);

        $this->assertDatabaseHas('kartu_keluargas', $data);
     }

     /** @test */
     public function dapat_mengambil_semua_kartu_keluarga()
     {
         KartuKeluarga::factory()->count(3)->create();

         $response = $this->getJson('/api/kartu_keluarga');

         $response->assertStatus(200)
                  ->assertJsonStructure([
                      '*' => ['id', 'nomor_kk', 'kepala_keluarga', 'alamat', 'created_at', 'updated_at']
                  ]);
     }

     /** @test */
     public function dapat_mengupdate_kartu_keluarga()
     {
        // Buat data KK
         $kk = KartuKeluarga::factory()->create();

        // Data baru untuk update
        $dataUpdate = [
            'nomor_kk' => '9876543210987654',
            'kepala_keluarga' => 'Joko Widodo',
            'alamat' => 'Jl. Sudirman No. 45',
        ];

        // Kirim request UPDATE
        $response = $this->putJson("/api/kartu_keluarga/{$kk->id}", $dataUpdate);

        // Debug response
        $response->dump(); // Tambahkan ini untuk melihat response asli

        // Pastikan response berhasil
        $response->assertStatus(200)
                ->assertJson([
                    'message' => 'Kartu Keluarga berhasil diperbarui'
                ]);

        // Cek apakah data terupdate di database
        $this->assertDatabaseHas('kartu_keluargas', $dataUpdate);
     }

     /** @test */
     public function dapat_menghapus_kartu_keluarga()
     {
        // Buat data Kartu Keluarga terlebih dahulu
        $kk = \App\Models\KartuKeluarga::factory()->create();

        // Kirim request DELETE
        $response = $this->deleteJson("/api/kartu_keluarga/{$kk->id}");

        // Tambahkan dump() untuk melihat isi response
        $response->dump();

        // Periksa apakah response berhasil
        $response->assertStatus(200)
                ->assertJson(['message' => 'Kartu Keluarga berhasil dihapus']);

        // Periksa apakah data sudah dihapus dari database
        $this->assertDatabaseMissing('kartu_keluargas', ['id' => $kk->id]);
     }
}
