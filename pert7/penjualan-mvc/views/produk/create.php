<h2>Tambah Produk</h2>

<form action="index.php?action=create" method="POST">
    <table cellpadding="5">
        <tr>
            <td>Nama Produk</td>
            <td>: <input type="text" name="nama_produk" required></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td>: <input type="number" name="harga" required></td>
        </tr>
        <tr>
            <td>Stok</td>
            <td>: <input type="number" name="stok" required></td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit" name="simpan">Simpan</button>
                <a href="index.php">Batal</a>
            </td>
        </tr>
    </table>
</form>