<?php

// 1. line ini berfungsi untuk menentukan predikat kelulusan berdasarkan nilai ipk yang dikirimkan
function statusKelulusan(float $ipk): string
{
    // modifikasi 1: penambahan kategori predikat cumlaude
    if ($ipk >= 3.75) return 'Dengan Pujian (Cumlaude)';
    if ($ipk >= 3.50) return 'Sangat Memuaskan';
    if ($ipk >= 3.00) return 'Memuaskan';
    return 'Perlu Peningkatan';
}

// 2. line ini berfungsi untuk menyimpan seluruh identitas dan data akademik mahasiswa ke dalam array asosiatif
// modifikasi 1 (lanjutan): penambahan field baru fakultas, email, dan status_aktif
$mahasiswa = [
    'nim' => '2026001',
    'nama' => 'Andi Pratama',
    'fakultas' => 'Teknologi Informasi',
    'prodi' => 'Teknik Informatika',
    'semester' => 1,
    'email' => 'andi.pratama@kampus.ac.id',
    'status_aktif' => 'Aktif',
    'ipk' => 3.85
];
?>
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Biodata Mahasiswa</title>
    <!-- modifikasi 2: penambahan styling tampilan tabel bergaris dan label predikat -->
    <style>
        body {
            font-family: sans-serif;
            margin: 40px;
        }
        table {
            border-collapse: collapse;
            width: 450px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .predikat {
            margin-top: 15px;
            font-weight: bold;
            color: #155724;
            background-color: #d4edda;
            padding: 10px;
            border-radius: 4px;
            width: fit-content;
        }
    </style>
</head>

<body>
    <h1>Biodata Mahasiswa</h1>
    <table>
        <!-- 3. line ini berfungsi untuk melakukan iterasi/looping pada setiap pasangan key dan value di dalam array mahasiswa -->
        <?php foreach ($mahasiswa as $kunci => $nilai): ?>
            <tr>
                <!-- 4. line ini berfungsi untuk mengubah format key array agar huruf awal kapital dan garis bawah diganti spasi -->
                <th><?= ucfirst(str_replace('_', ' ', $kunci)) ?></th>

                <?php
                /* 
                   RIWAYAT ERROR:
                   // <td><?= htmlspecialchars((string)$val) ?></td>
                   line ini error karna memanggil variabel $val yang belum dideklarasikan di perulangan foreach, jadinya muncul pesan Warning: Undefined variable $val
                   Lalu saya perbaiki dengan cara mengganti pemanggilan variabel tersebut jadi $nilai sama dengan nama variabel penampung data di foreach
                */
                ?>
                <td><?= htmlspecialchars((string)$nilai) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- 5. line ini berfungsi untuk memanggil fungsi evaluasi kelulusan menggunakan nilai ipk dari array dan menampilkannya ke halaman web -->
    <p class="predikat">Predikat Kelulusan: <?= statusKelulusan($mahasiswa['ipk']) ?></p>
</body>

</html>