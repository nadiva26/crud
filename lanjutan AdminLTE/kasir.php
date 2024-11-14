<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<section class="content">
      <div class="row">
        <div class="col-xs-12">

         <h2><i class="fa fa-shopping-cart"></i> Kasir</h2>
          <div class="row">
           <!-- Bagian Pencarian Produk -->
<div class="col-md-7">
  <div class="card mb-3">
    <div class="card-header">
      <h5>Cari Barang</h5>
    </div>
    <div class="card-body">
      <div class="card-body pb-0">
                        <div class="form-group">
                        <input type="text" autofocus name="cari" id="cari" class="form-control" placeholder="Masukan Kode Barang [ENTER]">
                        <ul id="results"></ul>
<!-- Input Pencarian Barang -->
 <!-- Input Pencarian Barang 
                          <input type="text" autofocus name="cari_barang" id="cari_barang" class="form-control" placeholder="Masukan Kode Barang [ENTER]" onkeydown="checkEnter(event)">-->
                        <div id="hasil_cari"></div>
                        </div>
      </div>
    </div>
  </div>

  <!-- Bagian Tabel Barang -->
  <div class="card">
    <div class="card-header">
      <h5>Tabel Produk</h5>
    </div>
    <div class="card-body">
      <table class="table table-striped" id="tabel_produk">
        <thead>
          <tr>
            
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Deskripsi</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Stok</th>
            <th>Gambar Produk</th>
           
          </tr>
        </thead>
        <tbody>

        <?php
                include "conf/conn.php";
                $no=0;
                $query=mysqli_query($connection, "SELECT * FROM produk_gambar");
                while ($row= mysqli_fetch_assoc($query))
                {
                ?>
          <tr>
                  <td><?php echo $row['id'];?></td>
                  <td><?php echo $row['nama_produk'];?></td>
                  <td><?php echo $row['deskripsi'];?></td>
                  <td><?php echo $row['harga_beli'];?></td>
                  <td><?php echo $row['harga_jual'];?></td>
                  <td><?php echo $row['stok'];?></td>
                  <td style="text-align: center;"><img src="pages/produk/gambar/<?php echo $row['gambar_produk']; ?>" style="width: 120px;"></td>
                  
</tr>

          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Bagian Keranjang (Kolom Kanan) -->
<div class="col-md-5">
  <div class="card" style="min-height: 400px; width: 600px;">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5><i class="fa fa-shopping-cart"></i> Keranjang</h5>
      <button
        class="btn btn-danger"
        onclick="resetCart()"
      >
        <i class="fa fa-trash"></i> Reset Keranjang
      </button>
    </div>
    <div class="card-body">
      <table
        class="table"
        id="cart-table"
        style="table-layout: fixed; width: 100%;"
      >
        <thead>
          <tr>
            <th style="width: 20%;">ID Barang</th>
            <th style="width: 20%;">Barang</th>
            <th style="width: 15%;">Harga</th>
            <th style="width: 10%;">Qty</th>
          
            <th style="width: 15%;">Total</th>
            <th style="width: 10%;">Aksi</th>
          </tr>
        </thead>
        <tbody id="cart-body">
          <!-- Isi keranjang akan tampil di sini -->
                </tbody>
              </table>
              <div class="mb-3">
                <label
                  for="transaction-id"
                  class="form-label"
                  >No Transaksi</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="transaction-id"
                  value="TR001482"
                />
              </div>
              <div>
                <label
                  for="customer"
                  class="form-label"
                  >Pelanggan</label
                >
                <select
                  class="form-control"
                  id="customer"
                >
                  <option selected>Pilih Pelanggan</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <!-- Tambahkan opsi pelanggan -->
                </select>
              </div>
              <div class="mb-3">
  <label for="total" class="form-label">Grand Total</label>
  <input type="text" class="form-control" id="total" value="0" readonly />
</div>

<div class="mb-3">
  <label for="pay" class="form-label">Jumlah Bayar</label>
  <input type="number" class="form-control" id="pay" oninput="calculateChange()" />
</div>

<div class="mb-3">
  <label for="change" class="form-label">Kembalian</label>
  <input type="text" class="form-control" id="change" value="0" readonly />
</div>

<button id="processTransaction" class="btn btn-primary">Proses Transaksi</button>

<!-- Modal Detail Transaksi -->
<div class="modal fade" id="transactionDetailModal" tabindex="-1" role="dialog" aria-labelledby="transactionDetailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="transactionDetailModalLabel">Detail Transaksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <h3>Test</h3>
          <p>Indonesia<br>Telp. 087788990022</p>
        </div>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Harga</th>
              <th>Qty</th>
              <th>Diskon</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody id="transaction-items">
            <!-- Isi tabel ini dengan produk dari keranjang -->
          </tbody>
        </table>
        <p>Total Diskon: <span id="total-discount">Rp0</span></p>
        <p>Total Bayar: <span id="total-pay">Rp0</span></p>
        <p>Dibayar: <span id="paid-amount">Rp0</span></p>
        <p>Kembali: <span id="change-amount">Rp0</span></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="printTransaction()">Print</button>
      </div>
    </div>
  </div>
</div>

          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap JS CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JavaScript -->
    <script>
//format mata uang rupiah
const rupiah = (number)=>{
    return new Intl.NumberFormat("id-ID", {
      style: "currency",
      currency: "IDR"
    }).format(number);
  }

//ketika tombol enter di tekan, tambah item ke keranjang belanja
$(document).on("keyup", "#cari", function(e) {
  if (e.which == 13) {
   //alert('hallo');

    let query = document.getElementById("cari").value;
    console.log(query)

            // Buat request AJAX ke PHP
            let xhr = new XMLHttpRequest();
            xhr.open("GET", "cariProduk.php?query=" + query, true);
            
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Parse hasil pencarian dalam format JSON
                    let results = JSON.parse(xhr.responseText);
                    //console.log(result)
                    let output = '';

                    // Jika ada hasil, tampilkan
                    if (results.length > 0) {
                        results.forEach(function (item) {
                            output += '<li><strong>' + item.id + '</strong>: ' + item.nama_produk + '|' +item.harga_jual + '</li>';
                            //alert(output)
                            addToCart(item.id, item.nama_produk, item.harga_jual, '1') 
                            //alert("Data Berhasil Di Tambahkan")
                        });
                    } else {
                      alert("Data Tidak Ditemukan..!");
                        output = '<li>No results found</li>';
                    }

                    // Tampilkan hasil ke dalam HTML
                    document.getElementById("results").innerHTML = output;
                }
            };
            xhr.send();
 }
})

//fungsi untuk memasukkan isian chart ke dalam tabel detail_penjualan
function saveCartToDetailPenjualan() {
            for (let i = 0; i < cart.length; i++) {
                let item = cart[i];

                // Gunakan AJAX untuk mengirim data ke PHP
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "save_cart.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        console.log(xhr.responseText);
                    }
                };

                // Kirim data produk ke server
                //item.produk_id, item.barang, item.harga
                const total_bayar = parseInt(document.getElementById('total').value);
                const nmr_transaksi = document.getElementById('transaction-id').value;
                let data = `product_id=${item.id}&harga=${item.price}&qty=${item.qty}&total=${total_bayar}&nmr_transaksi=${nmr_transaksi}`;
                xhr.send(data);
                //alert(data);
            }
            //alert("Data cart berhasil disimpan ke tabel detail_penjualan!");
        }


//fungsi untuk memasukkan isian chart ke dalam tabel penjualan
        function saveCartToPenjualan() {
           // Gunakan AJAX untuk mengirim data ke PHP
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "save_cart2.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        console.log(xhr.responseText);
                    }
                };

                // Kirim data produk ke server
                const nmr_transaksi = document.getElementById('transaction-id').value;
                const id_pelanggan = document.getElementById('customer').value;
                const total_bayar = parseInt(document.getElementById('total').value);
                
                let data = `id_pelanggan=${id_pelanggan}&total=${total_bayar}&nmr_transaksi=${nmr_transaksi}`;
                xhr.send(data);
                //alert(data);
                //alert("Data cart berhasil disimpan ke tabel penjualan!");
        }

       
        /* untuk melakukan pencarian data dari input text cari_barang
document.getElementById('cari_barang').addEventListener('keyup', function() {
    const query = this.value.toLowerCase(); 
    const rows = document.querySelectorAll('tbody tr');

    rows.forEach(row => {
        const itemId = row.querySelector('td:nth-child(2)').innerText.toLowerCase(); // Ambil Kode Barang dari kolom kedua
        const itemName = row.querySelector('td:nth-child(3)').innerText.toLowerCase(); // Ambil nama barang dari kolom ketiga

        if (itemId.includes(query) || itemName.includes(query)) {
            row.style.display = ''; // Tampilkan jika cocok dengan ID atau nama barang
        } else {
            row.style.display = 'none'; // Sembunyikan baris jika tidak cocok
        }
    });
});*/


//definisi variabel array cart 
      let cart = [];
//fungsi untuk menambah barang ke keranjang
  function addToCart(id, name, price, qty) {
  qty = parseInt(qty); // Pastikan kuantitas adalah angka
  const existingItem = cart.find((item) => item.id === id);
  if (existingItem) {
    existingItem.qty += qty;
    existingItem.total = existingItem.qty * existingItem.price;
  } else {
    cart.push({ id, name, price, qty, total: price * qty });
  }
  updateCartTable();
}

// Fungsi untuk menghapus barang dari keranjang
      function removeFromCart(id) {
        cart = cart.filter((item) => item.id !== id);
        updateCartTable();
      }

//fungsi untuk merubah jumlah barang dalam cart
      function updateQty(id, newQty) {
  newQty = parseInt(newQty); // Pastikan kuantitas adalah angka
  const item = cart.find((item) => item.id === id);
  if (item && newQty > 0) {
    item.qty = newQty;
    item.total = item.price * newQty;
    updateCartTable();
  }
}

//fungsi untuk merubah data dalam cart
      function updateCartTable() {
  const cartBody = document.getElementById('cart-body');
  cartBody.innerHTML = '';
  let grandTotal = 0;

  cart.forEach((item) => {
    const row = document.createElement('tr');
    row.innerHTML = `
      <td>${item.id}</td>
      <td>${item.name}</td>
      <td>Rp${item.price}</td>
      <td><input type="number" min="1" value="${item.qty}" onchange="updateQty('${item.id}', this.value)" style="width: 60px;" /></td>
      <td>Rp${item.total}</td>
      <td><button class="btn btn-danger btn-sm" onclick="removeFromCart('${item.id}')"><i class="fas fa-times"></i></button></td>
    `;
    cartBody.appendChild(row);
    grandTotal += item.total;
  });

  document.getElementById('total').value = grandTotal;
  calculateChange();
}


      // Fungsi untuk mereset keranjang
      function resetCart() {
        cart = [];
        updateCartTable();
      }

      // Fungsi untuk menghitung kembalian
function calculateChange() {
  let total = parseInt(document.getElementById('total').value); // Mengambil nilai grand total

  const pay = parseInt(document.getElementById('pay').value); // Mengambil nilai jumlah bayar
  
  if (!isNaN(pay) && pay >= total) { // Pastikan jumlah bayar valid dan lebih besar atau sama dengan total
    const change = pay - total; // Hitung kembalian
    document.getElementById('change').value = rupiah(change); // Tampilkan kembalian
  } else {
    document.getElementById('change').value = 0; // Set kembalian ke 0 jika jumlah bayar kurang dari total
  }
}


//tombol proses transaksi
document.getElementById('processTransaction').addEventListener('click', function () {
  // Ambil data dari keranjang
  const cartItems = cart; // Dari kode sebelumnya, array `cart` menyimpan item-item dalam keranjang
  const tbody = document.getElementById('transaction-items');
  tbody.innerHTML = ''; // Kosongkan tabel sebelum mengisi ulang

  let totalDiscount = 0; // Tambahkan logika diskon sesuai kebutuhan
  let totalPay = 0;

  // Loop melalui item dalam keranjang dan tambahkan ke tabel modal
  cartItems.forEach((item) => {
    const row = document.createElement('tr');
    row.innerHTML = `
      <td>${item.name}</td>
      <td>Rp${item.price}</td>
      <td>${item.qty}</td>
      <td>Rp0</td> <!-- Diskon diatur Rp0 untuk sekarang -->
      <td>Rp${item.total}</td>
    `;
    tbody.appendChild(row);
    totalPay += item.total;
    });
//tambah ke tabel detail_penjualan
  saveCartToDetailPenjualan();
  //tambah ke tabel penjualan
  saveCartToPenjualan();
  // Hitung total bayar, diskon, dan kembalian
  const paidAmount = parseInt(document.getElementById('pay').value); // Jumlah yang dibayar oleh pelanggan
  const changeAmount = paidAmount - totalPay;

  // Update elemen modal dengan nilai yang tepat
  document.getElementById('total-discount').innerText = `Rp${totalDiscount}`;
  document.getElementById('total-pay').innerText = `Rp${totalPay}`;
  document.getElementById('paid-amount').innerText = `Rp${paidAmount}`;
  document.getElementById('change-amount').innerText = `Rp${changeAmount}`;

  // Tampilkan modal
  $('#transactionDetailModal').modal('show');
});

//fungsi untuk mencetak transaksi
function printTransaction() {
  // Membuka jendela baru dan mencetak isi modal
  const printContents = document.querySelector('#transactionDetailModal .modal-body').innerHTML;
  const originalContents = document.body.innerHTML;

  document.body.innerHTML = printContents;
  window.print();
  document.body.innerHTML = originalContents;

  // Reload halaman atau reset keranjang setelah transaksi selesai
  window.location.reload();
}

      // Fungsi untuk toggle sidebar
      document.getElementById('toggleSidebar').addEventListener('click', function () {
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');

        sidebar.classList.toggle('sidebar-hidden');
        mainContent.classList.toggle('content-expanded');
      });
    </script>

    <!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>

<!-- Javascript Datatable -->
<script type="text/javascript">
  $(document).ready(function(){
    $('#tabel_produk').DataTable();
  });
</script>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
