<?php
// Start error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if the page parameter is set
if (isset($_GET['page'])) {
    $page = $_GET['page'];

    switch ($page) {
        // Mahasiswa
        case 'data_mahasiswa':
            include 'pages/mahasiswa/data_mahasiswa.php';
            break;
        case 'tambah_mahasiswa':
            include 'pages/mahasiswa/tambah_mahasiswa.php';
            break;
        case 'ubah_mahasiswa':
            include 'pages/mahasiswa/ubah_mahasiswa.php';
            break;

        // Produk
        case 'data_produk':
            include 'pages/produk/data_produk.php';
            break;
        case 'tambah_produk':
            include 'pages/produk/tambah_produk.php';
            break;
        case 'ubah_produk':
            include 'pages/produk/ubah_produk.php';
            break;

        // Kasir
        case 'data_transaksi':
            include 'kasir.php'; 
            break;
        
        default:
            include "pages/beranda.php"; 
            break;
    }
} else {
    include "pages/beranda.php"; 
}
?>
