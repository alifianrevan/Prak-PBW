<?php

// 1. line ini berfungsi sebagai interface kontrak yang mewajibkan implementasi method kalkulasi hargaAkhir
interface BisaDihitung
{
    public function hargaAkhir(): float;
}

class Produk implements BisaDihitung
{
    // 2. line ini berfungsi sebagai constructor promotion untuk mendeklarasikan sekaligus mengisi properti nama, harga, dan stok
    // modifikasi 1: penambahan properti stok produk
    public function __construct(
        protected string $nama,
        protected float $harga,
        protected int $stok = 0
    ) {}

    public function hargaAkhir(): float
    {
        return $this->harga;
    }

    public function getNama(): string
    {
        return $this->nama;
    }

    // modifikasi 1 (lanjutan): method untuk mengecek apakah produk masih tersedia
    public function cekStok(): string
    {
        return $this->stok > 0 ? "Tersedia ({$this->stok})" : "Habis";
    }
}

class ProdukDiskon extends Produk
{
    // 3. line ini berfungsi memanggil constructor class induk (parent) dan mendefinisikan persentase diskon
    public function __construct(string $nama, float $harga, int $stok, private float $diskon)
    {
        /* 
           RIWAYAT ERROR:
           // parent::__construct($nama);
           line ini error karna argumen saat memanggil parent::__construct kurang parameter sehingga muncul Fatal error: Uncaught ArgumentCountError
           Lalu saya perbaiki dengan cara melengkapi semua parameter yang dibutuhkan constructor induk, parent::__construct($nama, $harga, $stok)
        */
        parent::__construct($nama, $harga, $stok);
    }

    // 4. line ini berfungsi untuk menghitung nominal harga akhir setelah dipotong persentase diskon
    public function hargaAkhir(): float
    {
        return $this->harga * (1 - $this->diskon / 100);
    }
}

// modifikasi 2: penambahan class turunan baru khusus produk yang dikenakan pajak PPN
class ProdukPajak extends Produk
{
    public function __construct(string $nama, float $harga, int $stok, private float $pajak = 11)
    {
        parent::__construct($nama, $harga, $stok);
    }

    public function hargaAkhir(): float
    {
        return $this->harga * (1 + $this->pajak / 100);
    }
}

$daftar = [
    new Produk('Keyboard', 250000, 5),
    new ProdukDiskon('Mouse', 150000, 10, 10),
    new ProdukPajak('Monitor', 1200000, 3, 11)
];

// 5. line ini berfungsi melakukan looping pada daftar objek array dan memformat nilai mata uang harga ke format Rupiah
foreach ($daftar as $produk) {
    echo $produk->getNama() . ' | Status: ' . $produk->cekStok() . ' | Harga Akhir: Rp ' . number_format($produk->hargaAkhir(), 0, ',', '.') . "<br>";
}