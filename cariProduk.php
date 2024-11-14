<?php
include "conf/conn.php";
// Ambil query pencarian dari request AJAX
$search_query = $_GET['query'];

// Buat query pencarian
$sql = "SELECT * FROM tabel_produk WHERE id LIKE '%$search_query%' OR nama_produk LIKE '%$search_query%'";


// Eksekusi query
$result = $conn->query($sql);

// Buat array untuk menyimpan hasil pencarian
$data = array();

if ($result->num_rows > 0) {
    // Masukkan hasil pencarian ke dalam array
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Kembalikan hasil pencarian dalam format JSON
echo json_encode($data);


// Tutup koneksi
$conn->close();

?>



