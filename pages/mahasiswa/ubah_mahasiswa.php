<?php
include "../../conf/conn.php"; // Ensure the path to the connection file is correct

// Check if 'id' is set in the GET request
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM mahasiswa WHERE id_mahasiswa = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the row
    $row = $result->fetch_assoc();

    if (!$row) {
        die("Data not found.");
    }
} else {
    die("Invalid ID.");
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>UBAH MAHASISWA</h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
            <li class="active">UBAH MAHASISWA</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <!-- form start -->
                    <form role="form" method="post" action="pages/mahasiswa/ubah_mahasiswa_proses.php">
                        <div class="box-body">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id_mahasiswa']); ?>">
                            <div class="form-group">
                                <label>NIM</label>
                                <input type="text" name="nim" class="form-control" placeholder="NIM" value="<?php echo htmlspecialchars($row['nim']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo htmlspecialchars($row['nama']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Kelas</label>
                                <select class="form-control" name="kelas" required>
                                    <option value="<?php echo htmlspecialchars($row['kelas']); ?>">- <?php echo htmlspecialchars($row['kelas']); ?> -</option>
                                    <option value="Pagi">Pagi</option>
                                    <option value="Siang">Siang</option>
                                    <option value="Malam">Malam</option>
                                    <option value="Karyawan">Karyawan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jurusan</label>
                                <select class="form-control" name="jurusan" required>
                                    <option value="<?php echo htmlspecialchars($row['jurusan']); ?>">- <?php echo htmlspecialchars($row['jurusan']); ?> -</option>
                                    <option value="Manajemen Informatika">Manajemen Informatika</option>
                                    <option value="Sistem Informasi">Sistem Informasi</option>
                                    <option value="Teknik Informatika">Teknik Informatika</option>
                                    <option value="Sistem Komputer">Sistem Komputer</option>
                                    <option value="Akutansi">Akutansi</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" title="Simpan Data">
                                <i class="glyphicon glyphicon-floppy-disk"></i> Simpan
                            </button>
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
