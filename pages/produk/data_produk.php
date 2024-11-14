<?php
// Include the database connection file
include "C:/xampp/htdocs/crud2/conf/conn.php";
 // Pastikan path ini benar

// Start the content wrapper
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>DATA PRODUK</h1>
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
                        <a href="index.php?page=tambah_produk" class="btn btn-primary" role="button" title="Tambah Data">
                            <i class="glyphicon glyphicon-plus"></i> Tambah
                        </a>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="produk" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Produk</th>
                                    <th>Deskripsi</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Stok</th>
                                    <th>Gambar Produk</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;

                                // Query the database
                                $query = $conn->query("SELECT * FROM tabel_produk ORDER BY id DESC");

                                // Check for query error
                                if ($query === false) {
                                    die("Query failed: " . $conn->error);
                                }

                                // Fetch results
                                while ($row = $query->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td><?php echo ++$no; ?></td>
                                        <td><?php echo htmlspecialchars($row['nama_produk']); ?></td>
                                        <td><?php echo htmlspecialchars($row['deskripsi']); ?></td>
                                        <td><?php echo htmlspecialchars($row['harga_beli']); ?></td>
                                        <td><?php echo htmlspecialchars($row['harga_jual']); ?></td>
                                        <td><?php echo htmlspecialchars($row['stok']); ?></td>
                                        <td style="text-align: center;"><img src="pages/produk/gambar/<?php echo $row['gambar_produk']; ?>" style="width: 120px;"></td>
                                        <td>
                                            <a href="index.php?page=ubah_produk&id=<?= $row[ 'id']; ?>" class="btn btn-success" role="button" title="Ubah Data"><i class="glyphicon glyphicon-edit"></i></a>
                                            <a href="pages/produk/hapus_produk.php?id=<?= $row['id']; ?>" class="btn btn-danger" role="button" title="Hapus Data"><i class="glyphicon glyphicon-trash"></i></a>
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
    $(document).ready(function () {
        $('#produk').DataTable();
    });
</script>
