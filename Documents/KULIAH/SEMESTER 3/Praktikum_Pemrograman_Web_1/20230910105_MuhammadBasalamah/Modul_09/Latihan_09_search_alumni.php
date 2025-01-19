<h2>Penelusuran Alumni</h2>
<form method="GET" action="">
    <input type="hidden" name="menu" value="search_alumni">
    <div class="mb-3">
        <label for="search_name" class="form-label">Nama Alumni</label>
        <input type="text" class="form-control" id="search_name" name="search_name" placeholder="Masukkan nama alumni"
            required>
    </div>
    <button type="submit" class="btn btn-primary">Cari</button>
</form>

<hr>
<h3>Hasil Pencarian</h3>
<?php
if (isset($_GET['search_name'])) {
    $search_name = $_GET['search_name'];
    include 'koneksi.php'; // Koneksi ke database

    $query = "SELECT * FROM alumni WHERE name LIKE '%$search_name%'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div>
                    <p><strong>Nama:</strong> {$row['name']}</p>
                    <p><strong>Tahun Lulus:</strong> {$row['graduation_year']}</p>
                    <p><strong>Pekerjaan:</strong> {$row['current_job']}</p>
                  </div><hr>";
        }
    } else {
        echo "<p>Alumni tidak ditemukan.</p>";
    }
}
?>