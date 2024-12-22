<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Staff;
use App\Models\informasi_publiks;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $staff = [
            ['nama' => 'Rizky Khapidsyah', 'jabatan' => 'Staff Kominfo', 'foto' => 'staff.png'],
            ['nama' => 'Andi Wijaya', 'jabatan' => 'Staff Kominfo', 'foto' => 'staff.png'],
            ['nama' => 'Budi Santoso', 'jabatan' => 'Staff Kominfo', 'foto' => 'staff.png'],
            ['nama' => 'Citra Dewi', 'jabatan' => 'Staff Kominfo', 'foto' => 'staff.png'],
            ['nama' => 'Budi', 'jabatan' => 'Staff Kominfo', 'foto' => 'staff.png'],
        ];

        foreach ($staff as $item) {
            Staff::create($item);
        }

        $users = [
            ['username' => 'admin', 'password' => Hash::make('admin'), 'email' => 'admin@gmail.com']
        ];

        foreach ($users as $user) {
            User::create($user);
        }

        $informasi_publik = [
            ['informasi' => 'Tersedia setiap saat', 'judul' => 'RTP BPKD Tahun 2023', 'dibuat' => '01-02-2024', 'tanggal_dokumen' => '01-02-2024', 'ukuran' => '0 Bytes', 'url' => 'https://drive.google.com/file/d/1Pg97EpH4q0gy2THwPXtsqZNWgKIfMgVN/view' ],
            ['informasi' => 'Tersedia setiap saat', 'judul' => 'RTP BPKD Tahun 2023', 'dibuat' => '01-02-2024', 'tanggal_dokumen' => '01-02-2024', 'ukuran' => '0 Bytes', 'url' => 'https://drive.google.com/file/d/1Pg97EpH4q0gy2THwPXtsqZNWgKIfMgVN/view' ],
            ['informasi' => 'Tersedia setiap saat', 'judul' => 'RTP BPKD Tahun 2023', 'dibuat' => '01-02-2024', 'tanggal_dokumen' => '01-02-2024', 'ukuran' => '0 Bytes', 'url' => 'https://drive.google.com/file/d/1Pg97EpH4q0gy2THwPXtsqZNWgKIfMgVN/view' ],
            ['informasi' => 'Tersedia setiap saat', 'judul' => 'RTP BPKD Tahun 2023', 'dibuat' => '01-02-2024', 'tanggal_dokumen' => '01-02-2024', 'ukuran' => '0 Bytes', 'url' => 'https://drive.google.com/file/d/1Pg97EpH4q0gy2THwPXtsqZNWgKIfMgVN/view' ],
            ['informasi' => 'Tersedia setiap saat', 'judul' => 'RTP BPKD Tahun 2023', 'dibuat' => '01-02-2024', 'tanggal_dokumen' => '01-02-2024', 'ukuran' => '0 Bytes', 'url' => 'https://drive.google.com/file/d/1Pg97EpH4q0gy2THwPXtsqZNWgKIfMgVN/view' ],
            ['informasi' => 'Tersedia setiap saat', 'judul' => 'RTP BPKD Tahun 2023', 'dibuat' => '01-02-2024', 'tanggal_dokumen' => '01-02-2024', 'ukuran' => '0 Bytes', 'url' => 'https://drive.google.com/file/d/1Pg97EpH4q0gy2THwPXtsqZNWgKIfMgVN/view' ],
        ];

        foreach ($informasi_publik as $informasi) {
            informasi_publiks::create($informasi);
        }
    }
}
