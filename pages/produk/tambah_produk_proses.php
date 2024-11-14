<?php
// Include the database connection file
include "../../conf/conn.php"; 

if ($_POST) {
    $nama_produk = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $stok = $_POST['stok'];

    // Menangani upload file gambar
    if (isset($_FILES['gambar_produk']) && $_FILES['gambar_produk']['error'] === UPLOAD_ERR_OK) {
        $targetDir = "gambar/"; // Pastikan folder ini ada
        $fileName = basename($_FILES['gambar_produk']['name']);
        $targetFilePath = $targetDir . $fileName;
        
        // Memindahkan file ke target directory
        if (move_uploaded_file($_FILES['gambar_produk']['tmp_name'], $targetFilePath)) {
            // Siapkan prepared statement
            $stmt = $conn->prepare("INSERT INTO tabel_produk (nama_produk, deskripsi, harga_beli, harga_jual, stok, gambar_produk) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssddss", $nama_produk, $deskripsi, $harga_beli, $harga_jual, $stok, $fileName);

            if ($stmt->execute()) {
                echo '<script>alert("Data Berhasil Ditambahkan !!!");
                window.location.href="../../index.php?page=data_produk"</script>';
            } else {
                die("Error adding record: " . $stmt->error);
            }

            $stmt->close();
        } else {
            die("Error uploading file.");
        }
    } else {
        die("Error: No file uploaded or file upload error.");
    }
}

$conn->close();
?>
