<?php
// Konfigurasi database
include "conf/conn.php";
// Ambil data dari permintaan POST
// let data = `product_id=${item.product_id}&harga=${item.harga}&qty=${item.qty}&total=${total_bayar}&nmr_transaksi=${nmr_transaksi}`;
$no_transaksi= $_POST['nmr_transaksi'];
$customer=$_POST['id_pelanggan'];
$total_bayar= $_POST['total'];
date_default_timezone_set('Asia/Jakarta');
$stringDate = date('d-m-Y H:i');

// Query untuk menyimpan data ke tabel penjualan

$sql = "INSERT INTO penjualan2 (no_transaksi,id_pelanggan, tgl_penjualan, total_penjualan) VALUES ('$no_transaksi','$customer', '$stringDate', '$total_bayar')";

if ($connection->query($sql) === TRUE) {
    echo "Item berhasil ditambahkan ke keranjang!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
