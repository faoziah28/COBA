<?php
session_start(); // Memulai session jika belum dimulai

// Definisi kelas Stack untuk menyimpan data mata kuliah
class Stack {
    private $stack;

    public function __construct() {
        $this->stack = [];
    }

    public function push($no, $nama, $sks, $semester, $prodi, $jenis) {
        $data = [
            'no' => $no,
            'nama' => $nama,
            'sks' => $sks,
            'semester' => $semester,
            'prodi' => $prodi,
            'jenis' => $jenis
        ];

        array_push($this->stack, $data);
    }

    public function pop() {
        return array_pop($this->stack);
    }

    public function getAllData() {
        return $this->stack;
    }

    public function isEmpty() {
        return empty($this->stack);
    }

    // Metode tambahan untuk menyimpan objek Stack ke dalam session
    public function save() {
        $_SESSION['stack'] = serialize($this);
    }

    // Metode tambahan untuk menghapus semua data dalam stack
    public function clear() {
        $this->stack = [];
        $this->save();
    }

    // Metode tambahan untuk mengambil objek Stack dari session
    public static function load() {
        if (isset($_SESSION['stack'])) {
            return unserialize($_SESSION['stack']);
        } else {
            return new Stack();
        }
    }
}

// Fungsi untuk menambah data mata kuliah
function tambahDataMatkul($no, $nama, $sks, $semester, $prodi, $jenis) {
    // Memanggil objek Stack dari session atau membuat baru jika belum ada
    $stack = Stack::load();

    // Menambahkan data ke dalam stack
    $stack->push($no, $nama, $sks, $semester, $prodi, $jenis);

    // Menyimpan kembali objek Stack yang telah dimodifikasi ke dalam session
    $stack->save();
}

// Fungsi untuk menghapus data mata kuliah terbaru (pop)
function popDataMatkul() {
    // Memanggil objek Stack dari session atau membuat baru jika belum ada
    $stack = Stack::load();

    // Menghapus data terbaru dari stack
    $stack->pop();

    // Menyimpan kembali objek Stack yang telah dimodifikasi ke dalam session
    $stack->save();
}

// Fungsi untuk menghapus semua data mata kuliah
function hapusSemuaDataMatkul() {
    // Memanggil objek Stack dari session atau membuat baru jika belum ada
    $stack = Stack::load();

    // Menghapus semua data dalam stack
    $stack->clear();
}

// Fungsi untuk menampilkan data mata kuliah
function tampilkanDataMatkul() {
    // Memanggil objek Stack dari session
    $stack = Stack::load();

    // Menampilkan data dari objek Stack
    if (!$stack->isEmpty()) {
        echo "<ul>";
        foreach ($stack->getAllData() as $item) {
            echo "<li>{$item['no']} - {$item['nama']} ({$item['prodi']} - {$item['jenis']}, {$item['sks']} SKS, Semester {$item['semester']})</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Belum ada data mata kuliah yang dimasukkan.</p>";
    }
}
?>
