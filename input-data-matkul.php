<?php

require('function2.php'); 

// Jika tombol Tambah Data Matkul ditekan
if (isset($_POST['add'])) {
    // Memanggil fungsi tambahDataMatkul untuk menambah data mata kuliah
    tambahDataMatkul(
        $_POST['inpNo'],
        $_POST['inpNama'],
        $_POST['inpSks'],
        $_POST['inpSMS'],
        $_POST['prodi'],
        $_POST['jenis']
    );
}

// Jika tombol Hapus Semua Data Matkul ditekan
if (isset($_POST['deleteAll'])) {
    // Memanggil fungsi hapusSemuaDataMatkul untuk menghapus semua data mata kuliah
    hapusSemuaDataMatkul();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Mata Kuliah</title>
    <style>
        /* CSS Styling */
    </style>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Mata Kuliah</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f0f0f0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            text-align: center;
            margin-bottom: 20px;
        }
        form label {
            display: block;
            margin-bottom: 10px;
        }
        form input[type=text],
        form input[type=number],
        form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        form button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
        }
        form button:hover {
            background-color: #45a049;
        }
        .data-list {
            list-style-type: none;
            padding: 0;
        }
        .data-item {
            background-color: #f9f9f9;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .data-item p {
            margin: 0;
        }
        .data-item h3 {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sistem Akademik - Politeknik Negeri Cilacap</h1>

        <form action="" method="post">
            <label for="inpNo">Nomor:</label>
            <input type="number" id="inpNo" name="inpNo" required><br><br>

            <label for="inpNama">Nama Mata Kuliah:</label>
            <input type="text" id="inpNama" name="inpNama" required><br><br>

            <label for="inpSks">SKS:</label>
            <input type="number" id="inpSks" name="inpSks" required><br><br>

            <label for="inpSMS">Semester:</label>
            <input type="number" id="inpSMS" name="inpSMS" required><br><br>

            <label for="prodi">Program Studi:</label>
            <select id="prodi" name="prodi" required>
                <option value="D3 Teknik Informatika">D3 Teknik Informatika</option>
                <option value="D3 Teknik Elektro">D3 Teknik Elektro</option>
                <option value="D3 Teknik Mesin">D3 Teknik Mesin</option>
                <option value="D3 Teknik Listrik">D3 Teknik Listrik</option>
                <option value="D3 Teknik Pengendalian Pencemaran Lingkungan">D4 Teknik Pengendalian Pencemaran Lingkungan</option>
                <option value="D4 Pengembangan Produk Agro Industri">D4 Pengembangan Produk Agroindustri</option>
            </select><br><br>

            <label for="jenis">Jenis (Teori/Praktek):</label>
            <select id="jenis" name="jenis" required>
                <option value="T">Teori</option>
                <option value="P">Praktek</option>
            </select><br><br>

<button type="submit" name="add">Kirim</button>


</form>

<h2>Daftar Mata Kuliah:</h2>
<?php
// Memanggil fungsi untuk menampilkan data mata kuliah yang tersimpan di session
tampilkanDataMatkul();

?>
<br>
<br>
 <br>
 <p>Apakah ingin kembali ke Menu Utama? <b><a href='index.php'>Y</a> / <a href='end.php'>T</a></b></p>
 <a href='index.php'>Kembali ke menu utama</a>
    </div>
</body>
</html>
