<?php
require_once 'function2.php';


// Handling form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        // Adding course data
        tambahDataMatkul(
            $_POST['inpNo'],
            $_POST['inpNama'],
            $_POST['inpSks'],
            $_POST['inpSMS'],
            $_POST['prodi'],
            $_POST['jenis']
        );
    } elseif (isset($_POST['pop'])) {
        // Menghapus data mata kuliah terbaru (pop)
        popDataMatkul();
    } elseif (isset($_POST['clear'])) {
        // Menghapus semua data mata kuliah
        hapusSemuaDataMatkul();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Mata Kuliah</title>
    <style>
        .menu {
            text-align: center; /* Mengatur teks menu menjadi rata tengah */
        }
        .menu a {
            display: block; /* Mengubah link menjadi blok untuk memudahkan penataan */
            margin-bottom: 10px; /* Memberikan jarak antar link */
        }
    </style>
</head>
<body>
    <h1 style="width: 100%; text-align: center;">Sistem Akademik <br> Politeknik Negeri Cilacap <br> Menu Utama</h1>

    <form action="" method="post">
        <div class="menu">
            <a href="input-data-matkul.php">1. Input Data Matkul</a>
            <a href="hapuscoba.php">2. Hapus Data Matkul</a>
            <a href="input-data-matkul.php">3. Cetak Data Matkul</a>       
        </div>
        <br><br>
       
    </form>
</body>
</html>

<?php
    if(isset($_POST['submit'])){
        $url = $_POST['selection'];
        header("Location: ".$url);
        exit();
    }
?>
