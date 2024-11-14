<?php
// Include the database connection file
include "C:/xampp/htdocs/crud 2/conf/conn.php";
if ($_POST) {
    $nama_produk = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $stok = $_POST['stok'];
    $gambar_produk = $_POST['gambar_produk'];

    $stmt = $conn->prepare("UPDATE tabel_produk SET nama_produk = ?, deskripsi = ?, harga_beli = ?, harga_jual = ?, stok= ?, gambar_produk = ?,  WHERE id = ?");
    $stmt->bind_param("ssssi", $nama_produk, $deskripsi, $harga_beli, $harga_jual, $stok, $gambar_produk, $id);

  
    if ($stmt->execute()) {
        echo '<script>alert("Data Berhasil Diubah !!!");
        window.location.href="../../index.php?page=data_produk"</script>';
    } else {
        die("Error updating record: " . $stmt->error);
    }


    $stmt->close();
}


$conn->close();
?>
