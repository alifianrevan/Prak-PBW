<h2>Daftar Produk</h2>

<a href="index.php?action=create">Tambah Produk</a>
<br><br>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($produk)) { ?>
    <tr>
        <td><?= $row['id']; ?></td>
        <td><?= $row['nama_produk']; ?></td>
        <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
        <td><?= $row['stok']; ?></td>
        <td>
            <a href="index.php?action=edit&id=<?= $row['id']; ?>">Edit</a>
        </td>
    </tr>
    <?php } ?>
</table>