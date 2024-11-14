<?php
ob_start();
include "C:/xampp/htdocs/crud 2/conf/conn.php";
require_once("../plugins/dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$query = mysqli_query($conn, "SELECT * FROM mahasiswa");

$html = '<html><head><title>Daftar Data Mahasiswa</title></head><body>';
$html .= '<center><h3>Daftar Data Mahasiswa</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
  <tr>
    <th>No</th>
    <th>NIM</th>
    <th>Nama</th>
    <th>Kelas</th>
    <th>Jurusan</th>
  </tr>';

$no = 1;
while ($row = mysqli_fetch_array($query)) {
  $html .= "<tr>
    <td>{$no}</td>
    <td>{$row['nim']}</td>
    <td>{$row['nama']}</td>
    <td>{$row['kelas']}</td>
    <td>{$row['jurusan']}</td>
  </tr>";
  $no++;
}

$html .= '</table></body></html>';

$dompdf->loadHtml($html);

// Setting paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render HTML as PDF
$dompdf->render();

// Force the PDF to download
$dompdf->stream('laporan_mahasiswa.pdf', array("Attachment" => 1));
