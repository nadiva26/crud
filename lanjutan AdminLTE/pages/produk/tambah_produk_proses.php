<?php
include "../../conf/conn.php";
if($_POST)
{
    $nama_produk   = $_POST['nama'];
    $deskripsi     = $_POST['deskripsi'];
    $harga_beli    = $_POST['harga_beli'];
    $harga_jual    = $_POST['harga_jual'];
    $stok          = $_POST['stok'];
    $gambar_produk = $_FILES['gambar_produk']['name'];

    //cek dulu jika ada gambar produk jalankan coding ini
if($gambar_produk != "") {
    $ekstensi_diperbolehkan = array('png','jpg','jpeg','bmp'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $gambar_produk); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar_produk']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar_produk; //menggabungkan angka acak dengan nama file sebenarnya
          if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                  move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                    // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                    $query = "INSERT INTO produk_gambar (nama_produk, deskripsi, harga_beli, harga_jual, stok,gambar_produk) VALUES ('$nama_produk', '$deskripsi', '$harga_beli', '$harga_jual','$stok' ,'$nama_gambar_baru')";
                    $result = mysqli_query($connection, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($connection).
                             " - ".mysqli_error($connection));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      //echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                      echo '<script>alert("Data Produk Berhasil Ditambahkan !!!"); 
                      window.location.href="../../index.php?page=data_produk"</script>';
                    }
  
              } else {     
               //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                  echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');
                   window.location.href='../../index.php?page=data_produk';</script>";
              }
  } else {
     $query = "INSERT INTO produk (nama_produk, deskripsi, harga_beli, harga_jual, stok,gambar_produk) VALUES ('$nama_produk', '$deskripsi', '$harga_beli', '$harga_jual','$stok', null)";
                    $result = mysqli_query($connection, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($connection).
                             " - ".mysqli_error($connection));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      //echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                      echo '<script>alert("Data Produk Berhasil Ditambahkan !!!"); 
                      window.location.href="../../index.php?page=data_produk"</script>';
                    }
  }
  
   
  

/*
$query = ("INSERT INTO mahasiswa(id_mahasiswa,nim,nama,kelas,jurusan) VALUES ('','".$nim."','".$nama."','".$kelas."','".$jurusan."')");
echo $query;

if(!mysqli_query($connection, "$query")){
die(mysqli_error($connection));
}else{
echo '<script>alert("Data Berhasil Ditambahkan !!!");
window.location.href="../../index.php?page=data_mahasiswa"</script>';
}
*/
}
?>