<?php
session_start(); // Starting the session

// Function to add course data to session
function tambahDataMatkul($no, $nama, $sks, $semester, $prodi, $jenis) {
    $data = [
        'no' => $no,
        'nama' => $nama,
        'sks' => $sks,
        'semester' => $semester,
        'prodi' => $prodi,
        'jenis' => $jenis
    ];

    if (!isset($_SESSION['data'])) {
        $_SESSION['data'] = [];
    }
    $_SESSION['data'][] = $data;
}

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
    } elseif (isset($_POST['deleteAll'])) {
        // Deleting all course data
        unset($_SESSION['data']);
        echo "<script>alert('Data sudah dihapus');</script>";
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
        /* CSS styles (unchanged) */
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
        .data-item .delete-btn {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            font-size: 14px;
            cursor: pointer;
            border-radius: 4px;
        }
        .data-item .delete-btn:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sistem Akademik - Politeknik Negeri Cilacap</h1>

        <form action="" method="post">
            <label for="inpNo">Nomor:</label>
            <input type="text" id="inpNo" name="inpNo" required><br><br>

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
                <option value="D3 Teknik Pengendalian Pencemaran Lingkungan">D3 Teknik Pengendalian Pencemaran Lingkungan</option>
            </select><br><br>

            <label for="jenis">Jenis (Teori/Praktek):</label>
            <select id="jenis" name="jenis" required>
                <option value="T">Teori</option>
                <option value="P">Praktek</option>
            </select><br><br>

            <button type="submit" name="add">Tambah Data Matkul</button>
            <button type="submit" name="deleteAll">Hapus Semua Data Matkul</button>
        </form>

        <h2>Daftar Mata Kuliah:</h2>
        <?php
        // Displaying data stored in session
        if (isset($_SESSION['data']) && !empty($_SESSION['data'])) {
            echo "<ul>";
            foreach ($_SESSION['data'] as $item) {
                echo "<li>{$item['no']} - {$item['nama']} ({$item['prodi']} - {$item['jenis']}, {$item['sks']} SKS, Semester {$item['semester']})</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>Belum ada data mata kuliah yang dimasukkan.</p>";
        }
        ?>
        
        <p>Apakah ingin kembali ke Menu Utama? <b><a href='halaman.php'>Ya</a> / <a href='end.php'>Tidak</a></b></p>
    </div>
</body>
</html>
