<?php
include "koneksi.php";
include "controllers/ProdukController.php";

$controller = new ProdukController($koneksi);

$action = $_GET['action'] ?? 'index';

if ($action === 'create') {
    $controller->create();
} elseif ($action === 'edit') {
    $controller->edit();
} else {
    $controller->index();
}
?>