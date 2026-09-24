<?php

// 1. line ini berfungsi sebagai kontrak interface agar setiap class turunannya wajib mengimplementasikan method ringkasan
interface Identitas
{
    public function ringkasan(): string;
}

class Mahasiswa implements Identitas
{
    private string $nim;
    private string $nama;

    // modifikasi 1: penambahan properti jurusan
    private string $jurusan;
    protected float $ipk;

    // 2. line ini berfungsi sebagai constructor untuk menginisialisasi atribut objek saat pertama kali diinstansiasi
    public function __construct(string $nim, string $nama, string $jurusan, float $ipk)
    {
        // modifikasi 1: validasi tambahan untuk memastikan nim tidak kosong
        if (empty($nim)) {
            throw new InvalidArgumentException('NIM tidak boleh kosong.');
        }
        $this->nim = $nim;
        $this->nama = $nama;
        $this->jurusan = $jurusan;
        $this->setIpk($ipk);
    }

    // 3. line ini berfungsi sebagai setter ipk yang memvalidasi agar nilai ipk berada pada rentang batas normal 0 sampai 4
    public function setIpk(float $ipk): void
    {
        /* 
           RIWAYAT ERROR:
           // $this->ipk = $ipk;
           line ini error karna sebelumnya gaa ada batasan nilai sehingga ipk minus atau lebih dari 4.0 tetap lolos tersimpan tanpa error
           Lalu saya perbaiki dengan cara menambahkan pengecekan kondisi if ($ipk < 0 || $ipk > 4) dan melempar throw new InvalidArgumentException
        */
        if ($ipk < 0 || $ipk > 4) {
            throw new InvalidArgumentException('IPK harus 0 sampai 4.');
        }
        $this->ipk = $ipk;
    }

    public function getIpk(): float
    {
        return $this->ipk;
    }

    // modifikasi 2: penambahan method baru untuk menentukan predikat akademik berdasarkan nilai ipk
    public function getPredikat(): string
    {
        if ($this->ipk >= 3.75) return 'Cumlaude';
        if ($this->ipk >= 3.50) return 'Sangat Memuaskan';
        if ($this->ipk >= 3.00) return 'Memuaskan';
        return 'Cukup';
    }

    // 4. line ini berfungsi untuk menggabungkan seluruh informasi data mahasiswa menjadi satu string deskripsi ringkas
    public function ringkasan(): string
    {
        return $this->nim . ' - ' . $this->nama . ' (' . $this->jurusan . ') - IPK: ' . $this->ipk . ' [' . $this->getPredikat() . ']';
    }
}

// 5. line ini berfungsi untuk membuat objek mahasiswa baru dari class dan menampilkan ringkasan datanya ke layar
$mhs = new Mahasiswa('2026001', 'Andi Pratama', 'Teknik Informatika', 3.75);
echo $mhs->ringkasan();