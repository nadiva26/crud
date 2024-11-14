<?php
// Include the database connection file
include "C:/xampp/htdocs/crud2/conf/conn.php";
 // Pastikan path ini benar

// Start the content wrapper
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>DATA MAHASISWA</h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
            <li class="active">DATA MAHASISWA</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                <div class="box-header">
    <a href="index.php?page=tambah_mahasiswa" class="btn btn-primary" role="button" title="Tambah Data">
        <i class="glyphicon glyphicon-plus"></i> Tambah
    </a>
    <a href="pages/report_all_mahasiswa.php" class="btn btn-primary" role="button" title="Print data">
        <i class="glyphicon glyphicon-print"></i>
    </a>
</div>

                    <div class="box-body table-responsive">
                        <table id="mahasiswa" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NIM</th>
                                    <th>NAMA</th>
                                    <th>KELAS</th>
                                    <th>JURUSAN</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $no = 0;

                                // Query the database
                                $query = $conn->query("SELECT * FROM mahasiswa ORDER BY id_mahasiswa DESC");

                                // Check for query error
                                if ($query === false) {
                                    die("Query failed: " . $conn->error);
                                }

                                // Fetch results
                                while ($row = $query->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td><?php echo ++$no; ?></td>
                                        <td><?php echo htmlspecialchars($row['nim']); ?></td>
                                        <td><?php echo htmlspecialchars($row['nama']); ?></td>
                                        <td><?php echo htmlspecialchars($row['kelas']); ?></td>
                                        <td><?php echo htmlspecialchars($row['jurusan']); ?></td>
                                        <td>
                                            <a href="index.php?page=ubah_mahasiswa&id=<?= $row['id_mahasiswa']; ?>" class="btn btn-success" role="button" title="Ubah Data"><i class="glyphicon glyphicon-edit"></i></a>
                                            <a href="pages/mahasiswa/hapus_mahasiswa.php?id=<?= $row['id_mahasiswa']; ?>" class="btn btn-danger" role="button" title="Hapus Data"><i class="glyphicon glyphicon-trash"></i></a>
                                            <a href="pages/report_mahasiswa.php?id=<?= $row['id_mahasiswa']; ?>" class="btn btn-danger" role="button" title="Print data"><i class="glyphicon glyphicon-print"></i></a>
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
        $('#mahasiswa').DataTable();
    });
</script>
