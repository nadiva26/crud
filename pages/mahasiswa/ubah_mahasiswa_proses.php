<?php
include "../../conf/conn.php"; // Ensure the path to the connection file is correct

if ($_POST) {
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];


    $stmt = $conn->prepare("UPDATE mahasiswa SET nim = ?, nama = ?, kelas = ?, jurusan = ? WHERE id_mahasiswa = ?");
    $stmt->bind_param("ssssi", $nim, $nama, $kelas, $jurusan, $id);

  
    if ($stmt->execute()) {
        echo '<script>alert("Data Berhasil Diubah !!!");
        window.location.href="../../index.php?page=data_mahasiswa"</script>';
    } else {
        die("Error updating record: " . $stmt->error);
    }


    $stmt->close();
}


$conn->close();
?>
