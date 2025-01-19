<?php
include 'Latihan_09_config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = $conn->prepare("DELETE FROM alumni WHERE id = ?");
    $sql->bind_param("i", $id);

    if ($sql->execute()) {
        echo "<div>Data berhasil dihapus.</div>";
        header("Location: Latihan_09_index.php?menu=alumni");
    } else {
        echo "<div>Error: " . $conn->error . "</div>";
    }
    $conn->close();
}
?>