<?php
include "../../conf/conn.php"; 

if ($_POST) {
    // Pastikan id ada dalam POST
    if (!isset($_POST['id'])) {
        die("ID tidak valid.");
    }

    $id = $_POST['id']; // Ambil ID dari POST
    $nama_produk = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $gambar_produk = $_POST['gambar_produk'];

    // Siapkan statement SQL
    $stmt = $conn->prepare("UPDATE tabel_produk SET nama_produk = ?, deskripsi = ?, harga_beli = ?, harga_jual = ?, gambar_produk = ? WHERE id = ?");
    
    if ($stmt === false) {
        die("Kesalahan dalam pernyataan: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("ssssii", $nama_produk, $deskripsi, $harga_beli, $harga_jual, $gambar_produk, $id);

    // Eksekusi statement
    if ($stmt->execute()) {
        echo '<script>alert("Data Berhasil Diubah !!!");
        window.location.href="../../index.php?page=data_produk"</script>';
    } else {
        die("Error updating record: " . $stmt->error);
    }

    // Tutup statement
    $stmt->close();
}

// Tutup koneksi
$conn->close();
?>
