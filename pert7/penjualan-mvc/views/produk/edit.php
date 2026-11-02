<h2>Edit Produk</h2>

<form action="index.php?action=edit&id=<?= $item['id']; ?>" method="POST">
    <table cellpadding="5">
        <tr>
            <td>Nama Produk</td>
            <td>: <input type="text" name="nama_produk" value="<?= $item['nama_produk']; ?>" required></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td>: <input type="number" name="harga" value="<?= $item['harga']; ?>" required></td>
        </tr>
        <tr>
            <td>Stok</td>
            <td>: <input type="number" name="stok" value="<?= $item['stok']; ?>" required></td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit" name="update">Update</button>
                <a href="index.php">Batal</a>
            </td>
        </tr>
    </table>
</form>