<h3>FORM DATA ALUMNI</h3>
<hr>
<?php
include 'Latihan_09_config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nama = htmlspecialchars($_POST['nama']);
    $tahun_lulus = intval($_POST['tahun_lulus']);
    $jurusan = htmlspecialchars($_POST['jurusan']);

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["foto"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "<div class='alert alert-danger'>File bukan gambar.</div>";
            $uploadOk = 0;
        }

        if ($_FILES["foto"]["size"] > 5000000) {
            echo "<div class='alert alert-danger'>Ukuran file terlalu besar.</div>";
            $uploadOk = 0;
        }

        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            echo "<div class='alert alert-danger'>Format file tidak didukung.</div>";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "<div class='alert alert-danger'>Gagal mengunggah file.</div>";
        } else {
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                $sql = $conn->prepare("INSERT INTO alumni (nama, tahun_lulus, jurusan, foto) VALUES (?, ?, ?, ?)");
                $sql->bind_param("siss", $nama, $tahun_lulus, $jurusan, $target_file);
                if ($sql->execute()) {
                    echo "<div class='alert alert-success'>Data berhasil ditambahkan.</div>";
                } else {
                    echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Terjadi kesalahan saat mengunggah file.</div>";
            }
        }
    } else {
        echo "<div class='alert alert-danger'>File tidak ditemukan atau error.</div>";
    }
    $conn->close();
}
?>

<form method="POST" action="" enctype="multipart/form-data">
    <label>Nama:</label>
    <input type="text" name="nama" required><br>
    <label>Tahun Lulus:</label>
    <input type="number" name="tahun_lulus" required><br>
    <label>Jurusan:</label>
    <input type="text" name="jurusan" required><br>
    <label>Foto:</label>
    <input type="file" name="foto"><br>
    <button type="submit">Submit</button>
</form>