<?php
include "../../conf/conn.php";
$id = $_GET['id'];
$gambar=$_GET['gambar'];
$gambar_lama = "gambar"."/".$gambar;
 //hapus gambar
 unlink($gambar_lama);

$query = ("DELETE FROM produk_gambar WHERE id ='$id'");
if(!mysqli_query($connection, "$query")){
    die(mysqli_error($connection));
}else{
echo '<script>alert("Data Berhasil Dihapus !!!");
window.location.href="../../index.php?page=data_produk"</script>';
}

?>