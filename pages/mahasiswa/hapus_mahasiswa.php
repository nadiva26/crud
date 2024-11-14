<?php
include "../../conf/conn.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM mahasiswa WHERE id_mahasiswa = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo '<script>alert("Data Berhasil Dihapus !!!");
        window.location.href="../../index.php?page=data_mahasiswa"</script>';
    } else {
        die("Error deleting record: " . $stmt->error);
    }
    $stmt->close();
} else {
    die("Invalid ID.");
}
$conn->close();
?>
