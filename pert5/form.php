<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Mahasiswa</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .card {
            background: #ffffff;
            width: 100%;
            max-width: 440px;
            padding: 32px 28px;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            border: 1px solid #e1e4e8;
        }

        .card h2 {
            text-align: center;
            color: #1a202c;
            margin-bottom: 8px;
            font-size: 22px;
            font-weight: 700;
        }

        .card p.subtitle {
            text-align: center;
            color: #718096;
            font-size: 13px;
            margin-bottom: 24px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-size: 13px;
            font-weight: 600;
            color: #4a5568;
        }

        input {
            width: 100%;
            padding: 10px 14px;
            border: 1.5px solid #cbd5e0;
            border-radius: 6px;
            font-size: 14px;
            color: #2d3748;
            transition: all 0.2s ease-in-out;
            outline: none;
        }

        input:focus {
            border-color: #3182ce;
            box-shadow: 0 0 0 3px rgba(49, 130, 206, 0.2);
        }

        button.btn-submit {
            width: 100%;
            padding: 12px;
            background-color: #3182ce;
            color: #ffffff;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s, transform 0.1s;
            margin-top: 10px;
        }

        button.btn-submit:hover {
            background-color: #2b6cb0;
        }

        button.btn-submit:active {
            transform: scale(0.98);
        }

        .footer-link {
            text-align: center;
            margin-top: 20px;
        }

        .footer-link a {
            color: #4a5568;
            text-decoration: none;
            font-size: 13px;
            transition: color 0.2s;
        }

        .footer-link a:hover {
            color: #3182ce;
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Tambah Mahasiswa</h2>
    <p class="subtitle">Silakan isi formulir data mahasiswa baru</p>

    <form action="simpan.php" method="post">
        <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" id="nim" name="nim" placeholder="Contoh: 4524210010" required>
        </div>

        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" placeholder="Masukkan nama mahasiswa" required>
        </div>

        <div class="form-group">
            <label for="email">Email Kampus</label>
            <input type="email" id="email" name="email" placeholder="nama@kampus.ac.id" required>
        </div>

        <div class="form-group">
            <label for="prodi">Program Studi</label>
            <input type="text" id="prodi" name="prodi" placeholder="Contoh: Teknik Informatika" required>
        </div>

        <div class="form-group">
            <label for="angkatan">Angkatan</label>
            <input type="number" id="angkatan" name="angkatan" placeholder="Contoh: 2024" required>
        </div>

        <div class="form-group">
            <label for="ipk">IPK</label>
            <input type="number" step="0.01" min="0" max="4.00" id="ipk" name="ipk" placeholder="0.00 - 4.00" required>
        </div>

        <button type="submit" class="btn-submit">Simpan Data Mahasiswa</button>

        <div class="footer-link">
            <a href="data.php">&larr; Lihat Daftar Mahasiswa</a>
        </div>
    </form>
</div>

</body>
</html>