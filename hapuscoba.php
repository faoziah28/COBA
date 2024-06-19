<?php
require('function2.php');

?>
<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['data'])) {
    $_SESSION['data'] = new SplStack();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['popping'])) {
        if (!$_SESSION['data']->isEmpty()) {
            $_SESSION['data']->pop();
            $message = "Data teratas berhasil dihapus.";
        } else {
            $message = "Tidak ada data untuk dihapus.";
        }
    } elseif (isset($_POST['deleteAll'])) {
        $_SESSION['data'] = new SplStack();
        $message = "Semua data berhasil dihapus.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Data Mata Kuliah</title>
</head>
<body>
   
    <form action="" method="post">
        <table>
            <tr>
                <td>
                    <button name="popping" style="background-color: aquamarine;">Hapus data paling atas</button>
                </td>
            </tr>
            <tr>
                <td>
                    <button name="deleteAll" style="background-color: red; color: white">Hapus semua data</button>
                </td>
            </tr>
        </table>
    </form>
    <?php
    if (isset($message)) {
        echo "<p><b>$message</b></p>";
    }
    ?>
    <p>Apakah ingin kembali ke Menu Utama? <b><a href='index.php'>Y</a> / <a href='end.php'>T</a></b></p>
    <a href="index.php">Kembali Ke Menu Utama</a>
</body>
</html>
