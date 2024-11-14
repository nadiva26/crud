<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      DATA PRODUK
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
        <li class="active">DATA PRODUK</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <a href="index.php?page=tambah_produk" class="btn btn-primary" role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
          </div>
            <div class="box-body table-responsive">
              <table id="produk" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>NAMA PRODUK</th>
                  <th>DESKRIPSI</th>
                  <th>HARGA BELI</th>
                  <th>HARGA JUAL</th>
                  <th>STOK</th>
                  <th>GAMBAR PRODUK</th>
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>

                <?php
                include "conf/conn.php";
                $no=0;
               // $query=mysql_query("SELECT * FROM mahasiswa ORDER BY id_mahasiswa DESC");//
                $query=mysqli_query($connection,"SELECT * FROM produk_gambar ORDER BY id DESC") or die(mysqli_error($connection));
                while ($row=mysqli_fetch_array($query))
                {
                ?>

                <tr>
                  <td><?php echo $no=$no+1;?></td>
                  <td><?php echo $row['nama_produk'];?></td>
                  <td><?php echo $row['deskripsi'];?></td>
                  <td><?php echo $row['harga_beli'];?></td>
                  <td><?php echo $row['harga_jual'];?></td>
                  <td><?php echo $row['stok'];?></td>
                  <td style="text-align: center;"><img src="pages/produk/gambar/<?php echo $row['gambar_produk']; ?>" style="width: 120px;"></td>
                  <td>
                    <a href="index.php?page=ubah_produk&id=<?=$row['id'];?>" class="btn btn-success" role="button" title="Ubah Data"><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="pages/produk/hapus_produk.php?id=<?=$row['id'];?>&gambar=<?=$row['gambar_produk'];?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" role="button" title="Hapus Data"><i class="glyphicon glyphicon-trash"></i></a>
                  </td>
                </tr>

                <?php } ?>

                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->

<!-- Javascript Datatable -->
<script type="text/javascript">
  $(document).ready(function(){
    $('#produk').DataTable();
  });
</script>