<?php
//$query = mysql_query("SELECT * FROM mahasiswa WHERE id_mahasiswa='".$_GET['id']."'");//
$query=mysqli_query($connection, "SELECT * FROM produk_gambar WHERE id ='".$_GET['id']."'")
or die(mysqli_error($connection));
$row = mysqli_fetch_array($query);
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      UBAH PRODUK
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
        <li class="active">UBAH PRODUK</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="pages/produk/ubah_produk_proses.php" enctype="multipart/form-data">
              <div class="box-body">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <input type="hidden" name="oldpic" value="<?php echo $row['gambar_produk']; ?>">
                <div class="form-group">
                  <label>Nama Produk</label>
                  <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk" value="<?php echo $row['nama_produk']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Deskripsi</label>
                  <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi" value="<?php echo $row['deskripsi']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Harga Beli</label>
                  <input type="number" name="harga_beli" class="form-control" placeholder="Harga Beli" value="<?php echo $row['harga_beli']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Harga Jual</label>
                  <input type="number" name="harga_jual" class="form-control" placeholder="Harga Jual" value="<?php echo $row['harga_jual']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Stok</label>
                  <input type="number" name="stok" class="form-control" placeholder="Stok" value="<?php echo $row['stok']; ?>" required>
                </div>       
                <div class="form-group">
          <label>Gambar Produk</label>
          <img src="pages/produk/gambar/<?php echo $row['gambar_produk']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
          <input type="file" name="gambar_produk" class="form-control" />
          <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar produk</i>
        </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" title="Simpan Data"> <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->