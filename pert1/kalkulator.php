<?php

// 1. line ini berfungsi sebagai inisialisasi awal variabel penampung hasil hitung dan pesan status validasi
$hasil = null;
$pesan = '';

// 2. line ini berfungsi untuk memastikan proses kalkulasi hanya dijalankan saat data dikirim melalui metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // 3. line ini berfungsi untuk mengambil input angka dari form, mengubah tipenya menjadi desimal (float), dan memberi nilai default 0 jika kosong
    $a = (float) ($_POST['a'] ?? 0);
    $b = (float) ($_POST['b'] ?? 0);
    $operator = $_POST['operator'] ?? '+';

    // 4. line ini berfungsi untuk menentukan operasi matematika berdasarkan simbol operator yang dipilih user
    switch ($operator) {
        case '+':
            $hasil = $a + $b;
            break;
        case '-':
            $hasil = $a - $b;
            break;
        case '*':
            $hasil = $a * $b;
            break;
        case '/':
            /* 
               RIWAYAT ERROR:
               // $hasil = $a / $b;
               line ini error karna saat input angka kedua diisi 0 langsung Fatal error: Uncaught DivisionByZeroError
               Lalu saya perbaiki dengan cara nambahin pengecekan kondisi if ($b == 0) dulu sebelum pembagian dieksekusi
            */
            if ($b == 0) {
                $pesan = 'Pembagian dengan nol tidak diperbolehkan.';
            } else {
                $hasil = $a / $b;
            }
            break;
        // modifikasi 1: penambahan operasi modulus (%) dan pangkat (^)
        case '%':
            if ($b == 0) {
                $pesan = 'Modulus dengan nol tidak dapat dilakukan.';
            } else {
                $hasil = $a % $b;
            }
            break;
        case '^':
            $hasil = $a ** $b;
            break;
        default:
            $pesan = 'Operator tidak valid.';
    }
}
?>
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Kalkulator Sederhana</title>
    <!-- modifikasi 2: penambahan styling tampilan container card, button, dan warna teks status -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px auto;
            max-width: 420px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        input, select, button {
            padding: 8px;
            margin: 5px 0;
            font-size: 14px;
        }
        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .error { color: red; font-weight: bold; }
        .sukses { color: green; font-weight: bold; }
    </style>
</head>

<body>
    <h1>Kalkulator Sederhana</h1>
    <form method="post">
        <input type="number" step="any" name="a" placeholder="Angka 1" required>
        <select name="operator">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
            <option value="%">%</option>
            <option value="^">^ (Pangkat)</option>
        </select>
        <input type="number" step="any" name="b" placeholder="Angka 2" required>
        <button type="submit">Hitung</button>
    </form>

    <!-- 5. line ini berfungsi untuk menampilkan pesan error validasi atau hasil hitung dengan proteksi xss via htmlspecialchars -->
    <?php if ($pesan): ?>
        <p class="error"><?= htmlspecialchars($pesan) ?></p>
    <?php elseif ($hasil !== null): ?>
        <p class="sukses">Hasil: <?= htmlspecialchars((string)$hasil) ?></p>
    <?php endif; ?>
</body>

</html>