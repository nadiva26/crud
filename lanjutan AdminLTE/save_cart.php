<?php
include "conf/conn.php";

// Ambil data dari permintaan POST

$nmr=$_POST['nmr_transaksi'];
$product_id = $_POST['product_id'];
$quantity = $_POST['qty'];
$price = $_POST['harga'];

// Query untuk menyimpan data ke tabel detail_penjualan
$sql1 = "INSERT INTO detail_penjualan (id_penjualan, produk_id, harga, qty) VALUES ('$nmr', '$product_id', '$price','$quantity')";
echo $sql1;
if ($connection->query($sql1) === TRUE) {
    echo "Item berhasil ditambahkan ke keranjang!";
} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}
// Tutup koneksi
$conn->close();
?>
