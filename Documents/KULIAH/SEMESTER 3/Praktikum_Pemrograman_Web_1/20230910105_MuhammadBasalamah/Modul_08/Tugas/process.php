<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = 'alumni.json'; // Nama file JSON

    // Ambil data dari form
    $newData = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'graduation_year' => $_POST['graduation_year'],
        'current_job' => $_POST['current_job']
    ];

    // Cek apakah file JSON sudah ada
    if (file_exists($file)) {
        $data = json_decode(file_get_contents($file), true); // Baca data yang ada
    } else {
        $data = []; // Jika belum ada, buat array kosong
    }

    // Tambahkan data baru ke array
    $data[] = $newData;

    // Simpan data ke file JSON
    if (file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT))) {
        echo "<h2>Data berhasil disimpan!</h2>";
        echo '<a href="index.php">Kembali</a>';
    } else {
        echo "<h2>Terjadi kesalahan saat menyimpan data.</h2>";
        echo '<a href="index.php">Kembali</a>';
    }
} else {
    echo "<h2>Akses tidak diizinkan.</h2>";
}
?>
