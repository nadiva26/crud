<?php
include "../../conf/conn.php";
if($_POST)
{
    $id = $_POST['id'];
    $nama_produk   = $_POST['nama_produk'];
    $deskripsi     = $_POST['deskripsi'];
    $harga_beli    = $_POST['harga_beli'];
    $harga_jual    = $_POST['harga_jual'];
    $stok          = $_POST['stok'];
    $gambar_produk = $_FILES['gambar_produk']['name'];

    $oldppic       = $_POST['oldpic'];
    $oldprofilepic = "gambar"."/".$oldppic;

    //cek dulu jika merubah gambar produk jalankan coding ini
    //jika file gambar diubah
  if($gambar_produk != "") {
    $ekstensi_diperbolehkan = array('png','jpg','jpeg','bmp'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $gambar_produk); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar_produk']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar_produk; //menggabungkan angka acak dengan nama file sebenarnya
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                  move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                      
                    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                    $query  = "UPDATE produk_gambar SET nama_produk = '$nama_produk', deskripsi = '$deskripsi', harga_beli = '$harga_beli', harga_jual = '$harga_jual', stok = '$stok', gambar_produk = '$nama_gambar_baru' ";
                    $query .= "WHERE id = '$id'";
                    //echo $query;
                    //hapus gambar lama
                    unlink($oldprofilepic);
                    $result = mysqli_query($connection, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($connection).
                             " - ".mysqli_error($connection));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data berhasil diubah.');
                      window.location.href='../../index.php?page=data_produk';</script>";
                    }
                      
              } else {     
               //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
               
                  echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');
                  window.location.href='../../index.php?page=data_produk'';</script>";
                  
              }
    }
    //jika file gambar tidak diubah
    else {
        
      // jalankan query UPDATE berdasarkan ID yang produknya kita edit
      $query  = "UPDATE produk_gambar SET nama_produk = '$nama_produk', deskripsi = '$deskripsi', harga_beli = '$harga_beli', harga_jual = '$harga_jual', stok = '$stok' ";
      $query .= "WHERE id = '$id'";
      $result = mysqli_query($connection, $query);
      // periska query apakah ada error
      if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($connection).
                             " - ".mysqli_error($connection));
      } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
          echo "<script>alert('Data berhasil diubah.');
          window.location.href='../../index.php?page=data_produk';</script>";
      }
          
    }



/*
$query = ("UPDATE mahasiswa SET nim='$nim',nama='$nama',kelas='$kelas',jurusan='$jurusan' WHERE id_mahasiswa ='$id'");
if(!mysqli_query($connection,"$query")){
die(mysqli_error($connection));
}else{
echo '<script>alert("Data Berhasil Diubah !!!");
window.location.href="../../index.php?page=data_mahasiswa"</script>';
}
*/
}
?>