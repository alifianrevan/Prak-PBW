<?php
include "koneksi.php";

$nim      = $_POST['nim'];
$nama     = $_POST['nama'];
$email    = $_POST['email'];
$prodi    = $_POST['prodi'];
$angkatan = $_POST['angkatan'];
$ipk      = $_POST['ipk'];

// Validasi fungsional rentang IPK
if ($ipk < 0 || $ipk > 4.00) {
    echo "Data gagal disimpan: Nilai IPK harus berada di rentang 0.00 hingga 4.00! <br><a href='form.php'>Kembali</a>";
    exit(); 
}

try {
    $query = mysqli_query(
        $koneksi, 
        "INSERT INTO mahasiswa 
        (nim, nama, email, prodi, angkatan, ipk) 
        VALUES 
        ('$nim', '$nama', '$email', '$prodi', '$angkatan', '$ipk')"
    );

    if ($query) {
        echo "Data berhasil disimpan. <br><a href='data.php'>Lihat Data</a> | <a href='form.php'>Tambah Lagi</a>";
    }
} catch (mysqli_sql_exception $e) {
    if ($e->getCode() == 1062) {
        echo "Data gagal disimpan: NIM atau Email sudah terdaftar di database! <br><a href='form.php'>Kembali</a>";
    } else {
        echo "Terjadi kesalahan: " . $e->getMessage();
    }
}
?>