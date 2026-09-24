<?php

function statusKelulusan(float $ipk): string
{
    if ($ipk >= 3.50) {
        return 'Sangat Memuaskan';
    }

    if ($ipk >= 3.00) {
        return 'Memuaskan';
    }

    return 'Perlu Peningkatan';
}

$mahasiswa = [
    'nim' => '20269001',
    'nama' => 'Andi Pratama',
    'prodi' => 'Teknik Informatika',
    'semester' => 1,

    // Modifikasi 1: field baru
    'angkatan' => 2026,

    'ipk' => 3.72
];

?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Biodata</title>
</head>

<body>

    <h1>Biodata Mahasiswa</h1>

    <ul>

        <?php foreach ($mahasiswa as $kunci => $nilai): ?>

            <li>
                <?= ucfirst($kunci) ?>:
                <?= htmlspecialchars((string)$nilai) ?>
            </li>

        <?php endforeach; ?>

    </ul>

    <p>
        Predikat:
        <?= statusKelulusan($mahasiswa['ipk']) ?>
    </p>

    <!-- Modifikasi 2: kondisi baru -->

    <?php if ($mahasiswa['semester'] >= 5 && $mahasiswa['ipk'] >= 3.50): ?>

        <p>
            Status: Mahasiswa tingkat akhir dengan IPK sangat baik.
        </p>

    <?php elseif ($mahasiswa['semester'] >= 5): ?>

        <p>
            Status: Mahasiswa tingkat akhir.
        </p>

    <?php else: ?>

        <p>
            Status: Mahasiswa tingkat awal.
        </p>

    <?php endif; ?>

</body>

</html>