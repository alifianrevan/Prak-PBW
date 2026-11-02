<?php
include "models/ProdukModel.php";

class ProdukController
{
    private $model;

    public function __construct($koneksi)
    {
        $this->model = new ProdukModel($koneksi);
    }

    public function index()
    {
        $produk = $this->model->getAllProduk();
        include "views/produk/index.php";
    }

    public function create()
    {
        if (isset($_POST['simpan'])) {
            $nama_produk = $_POST['nama_produk'];
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];

            $this->model->insertProduk($nama_produk, $harga, $stok);
            header("Location: index.php");
            exit;
        }

        include "views/produk/create.php";
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: index.php");
            exit;
        }

        if (isset($_POST['update'])) {
            $nama_produk = $_POST['nama_produk'];
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];

            $this->model->updateProduk($id, $nama_produk, $harga, $stok);
            header("Location: index.php");
            exit;
        }

        $item = $this->model->getProdukById($id);
        include "views/produk/edit.php";
    }
}
?>