<?php
class ProdukModel
{
    private $koneksi;

    public function __construct($koneksi)
    {
        $this->koneksi = $koneksi;
    }

    public function getAllProduk()
    {
        $query = mysqli_query($this->koneksi, "SELECT * FROM produk");
        return $query;
    }

    public function getProdukById($id)
    {
        $id = mysqli_real_escape_string($this->koneksi, $id);
        $query = mysqli_query($this->koneksi, "SELECT * FROM produk WHERE id = '$id'");
        return mysqli_fetch_assoc($query);
    }

    public function insertProduk($nama_produk, $harga, $stok)
    {
        $nama_produk = mysqli_real_escape_string($this->koneksi, $nama_produk);
        $harga = mysqli_real_escape_string($this->koneksi, $harga);
        $stok = mysqli_real_escape_string($this->koneksi, $stok);

        $sql = "INSERT INTO produk (nama_produk, harga, stok) VALUES ('$nama_produk', '$harga', '$stok')";
        return mysqli_query($this->koneksi, $sql);
    }

    public function updateProduk($id, $nama_produk, $harga, $stok)
    {
        $id = mysqli_real_escape_string($this->koneksi, $id);
        $nama_produk = mysqli_real_escape_string($this->koneksi, $nama_produk);
        $harga = mysqli_real_escape_string($this->koneksi, $harga);
        $stok = mysqli_real_escape_string($this->koneksi, $stok);

        $sql = "UPDATE produk SET nama_produk = '$nama_produk', harga = '$harga', stok = '$stok' WHERE id = '$id'";
        return mysqli_query($this->koneksi, $sql);
    }
}
?>