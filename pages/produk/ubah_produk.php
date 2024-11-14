<?php
// Include the database connection file
include "C:/xampp/htdocs/crud 2/conf/conn.php";

// Check if 'id' is set in the GET request
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM tabel_produk WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the row
    $row = $result->fetch_assoc();

    if (!$row) {
        die("Data tidak ditemukan.");
    }
} else {
    die("ID tidak valid.");
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>UBAH PRODUK</h1>
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
                    <!-- form start -->
                    <form role="form" method="post" action="pages/produk/proses_ubah.php">
                        <div class="box-body">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                            <div class="form-group">
                                <label>Nama Produk</label>
                                <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk" value="<?php echo htmlspecialchars($row['nama_produk']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi" value="<?php echo htmlspecialchars($row['deskripsi']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Harga Beli</label>
                                <input type="text" name="harga_beli" class="form-control" placeholder="Harga Beli" value="<?php echo htmlspecialchars($row['harga_beli']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Harga Jual</label>
                                <input type="text" name="harga_jual" class="form-control" placeholder="Harga Jual" value="<?php echo htmlspecialchars($row['harga_jual']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Stok </label>
                                <input type="text" name="stok" class="form-control" placeholder="stok" required>
                            </div>
                            <div class="form-group">
                                <label>Gambar Produk</label>
                                <input type="file" name="gambar_produk" class="form-control" placeholder="URL Gambar Produk" value="<?php echo htmlspecialchars($row['gambar_produk']); ?>" required>

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
