<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HomepageInfo;
use App\Models\HomepageFeature;

class HomepageSeeder extends Seeder
{
    public function run()
    {
        HomepageInfo::create([
            'headline' => 'Rumah Budaya Ratna',
            'subheadline' => 'Melestarikan Budaya Nusantara',
            'background_image' => 'BG.jpg',
        ]);

        HomepageFeature::insert([
            [
                'nama_fitur' => 'Event',
                'gambar' => '1.jpg',
                'link_tujuan' => '/event',
                'keterangan' => 'Kegiatan budaya terbaru'
            ],
            [
                'nama_fitur' => 'Kontak & Lokasi',
                'gambar' => '2.jpeg',
                'link_tujuan' => '/lokasi',
                'keterangan' => 'Alamat dan Google Maps'
            ],
            [
                'nama_fitur' => 'Tentang Kami',
                'gambar' => '3.jpeg',
                'link_tujuan' => '/tentang',
                'keterangan' => 'Profil Rumah Budaya Ratna'
            ],
            [
                'nama_fitur' => 'Reservasi',
                'gambar' => '4.jpeg',
                'link_tujuan' => '/reservasi',
                'keterangan' => 'Booking kunjungan'
            ],
            [
                'nama_fitur' => 'Galeri',
                'gambar' => '5.jpg',
                'link_tujuan' => '/galeri',
                'keterangan' => 'Dokumentasi kegiatan'
            ],
        ]);
    }
}
