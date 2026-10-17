<?php
include "koneksi.php";

// 1. Modifikasi Fitur: Logika Pencarian Mahasiswa (Berdasarkan Nama atau Prodi)
$keyword = isset($_GET['cari']) ? mysqli_real_escape_string($koneksi, $_GET['cari']) : '';

if (!empty($keyword)) {
    $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' OR prodi LIKE '%$keyword%' ORDER BY nim ASC");
} else {
    $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY nim ASC");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Data Mahasiswa</title>
</head>
<body class="bg-gray-100 p-8 font-sans text-gray-800">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-xl shadow-lg border border-gray-100">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Data Mahasiswa</h2>
        
        <!-- Header: Tombol Tambah & Form Pencarian (Fitur Baru) -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-3">
            <a href="create.php" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg shadow-sm transition w-full md:w-auto text-center">
                + Tambah Mahasiswa
            </a>

            <!-- Form Pencarian (Modifikasi 1) -->
            <form action="index.php" method="GET" class="flex gap-2 w-full md:w-auto">
                <input type="text" name="cari" value="<?= htmlspecialchars($keyword); ?>" placeholder="Cari nama atau prodi..." class="p-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 w-full md:w-64">
                <button type="submit" class="bg-gray-800 hover:bg-gray-700 text-white px-4 py-2 rounded-lg text-sm transition">Cari</button>
                <?php if (!empty($keyword)) : ?>
                    <a href="index.php" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-3 py-2 rounded-lg text-sm transition">Reset</a>
                <?php endif; ?>
            </form>
        </div>

        <!-- Tabel Data (Modifikasi 2: Zebra Striping, Hover Effect, dan Badge Kapsul IPK) -->
        <div class="overflow-x-auto rounded-lg border border-gray-200">
            <table class="w-full border-collapse text-left">
                <thead class="bg-blue-50 text-blue-900 border-b border-gray-200">
                    <tr>
                        <th class="p-3.5 font-semibold text-sm">NIM</th>
                        <th class="p-3.5 font-semibold text-sm">Nama</th>
                        <th class="p-3.5 font-semibold text-sm">Email</th>
                        <th class="p-3.5 font-semibold text-sm">Prodi</th>
                        <th class="p-3.5 font-semibold text-sm">Angkatan</th>
                        <th class="p-3.5 font-semibold text-sm">IPK</th>
                        <th class="p-3.5 font-semibold text-sm text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php if (mysqli_num_rows($query) > 0) { 
                        $no = 0;
                        while ($data = mysqli_fetch_assoc($query)) { 
                            $no++;
                            // Zebra Striping: Baris genap abu-abu tipis, baris ganjil putih
                            $rowBg = ($no % 2 == 0) ? 'bg-gray-50' : 'bg-white';
                    ?>
                    <tr class="<?= $rowBg; ?> hover:bg-blue-50/50 transition">
                        <td class="p-3.5 text-sm font-medium text-gray-900"><?= htmlspecialchars($data['nim']); ?></td>
                        <td class="p-3.5 text-sm text-gray-700"><?= htmlspecialchars($data['nama']); ?></td>
                        <td class="p-3.5 text-sm text-gray-600"><?= htmlspecialchars($data['email']); ?></td>
                        <td class="p-3.5 text-sm text-gray-700"><?= htmlspecialchars($data['prodi']); ?></td>
                        <td class="p-3.5 text-sm text-gray-600"><?= htmlspecialchars($data['angkatan']); ?></td>
                        <td class="p-3.5 text-sm">
                            <!-- Badge Kapsul IPK Berwarna -->
                            <span class="inline-block px-2.5 py-1 text-xs font-semibold rounded-full bg-emerald-100 text-emerald-800 border border-emerald-200">
                                <?= htmlspecialchars($data['ipk']); ?>
                            </span>
                        </td>
                        <td class="p-3.5 text-sm text-center">
                            <a href="edit.php?nim=<?= $data['nim']; ?>" class="text-blue-600 hover:text-blue-800 font-semibold transition">Edit</a>
                            <span class="mx-1 text-gray-300">|</span>
                            <a href="delete.php?nim=<?= $data['nim']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="text-rose-600 hover:text-rose-800 font-semibold transition">Hapus</a>
                        </td>
                    </tr>
                    <?php } 
                    } else { ?>
                    <tr>
                        <td colspan="7" class="text-center p-6 text-gray-400 bg-white">Data mahasiswa tidak ditemukan.</td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>