<?php
$IphoneList = array(
    array("Iphone 14 Pro Max", "Biru 128 GB", 16125000,  "iphone14promax.jpg"),
    array("Iphone 11", "Putih 128 GB", 5000000, "iphone11.jpg"),
    array("Iphone 12 pro", "Black 256 GB", 10500000, "iphone12pro.jpg"),
    array("Iphone 14 Pro", "biru 128 GB", 14125000, "iphone14pro.jpg"),
    array("Iphone 11 Pro", "Gray 128 GB", 6000000, "iphone11pro.jpg"),
    array("Iphone 12 Pro Max", "White 256 GB", 11500000, "iphone12promax.jpg")
);


// Ambil ID Paket dari URL
$id = isset($_GET['id']); // id berisikan produk, get utk mengambil,$id menyimpan
$paketTerpilih = $IphoneList[$id]; // Ambil paket yang dipilih berdasarkan ID
$harga = $paketTerpilih[3];

// membuat variabel kosong untuk menampung data dari form yg dikirim
$notransaksi = "";
$namacustomer = "";
$tanggal = "";
$tambahan = "";
$totalharga = 0;
$pembayaran = 0;
$kembalian = 0;

// Proses Form
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // pengecekkan apakah ada data yang dikirim menggunakan method post
    $notransaksi = $_POST['notransaksi']; // mengambil nilai dari inputan notransaksi dan disimpan ke $notransaksi
    $namacustomer = $_POST['namacustomer']; //mengambil nilai dari inputan namacustomer dan disimpan ke $namacustomer
    $tanggal = $_POST['tanggal']; //mengambil nilai dari inputan tanggal dan disimpan ke $tanggal
    $tambahan = isset($_POST['tambahan']) ? (int) $_POST['tambahan'] : 0; // mngecek apkh ad data tambahan jika tdk ad maka defaultnya 0
    $pembayaran = isset($_POST['pembayaran']) ? (int) $_POST['pembayaran'] : 0; // mngecek apkh ad data tambahan jika tdk ad maka defaultnya 0
    $kode_diskon = isset($_POST['kode_diskon']) ? $_POST['kode_diskon'] : '';


    // Mengambil harga yang benar
    $harga = $paketTerpilih[2];  // Indeks 2 adalah harga produk, bukan gambar

    // Ambil jumlah produk yang dimasukkan oleh pengguna
    $jumlah = isset($_POST['jumlah']) ? (int) $_POST['jumlah'] : 1; // Jika tidak ada jumlah yang dimasukkan, set default 1

    // Mengalikan harga produk dengan jumlah produk dan menambahkan tambahan
    if (isset($_POST['hitung_total'])) {
        $totalharga = $harga * $jumlah + $tambahan; // Menghitung total harga
    }

    if (isset($_POST['hitung_kembalian'])) {
        $totalharga = (int) $_POST['totalharga']; //mengambil nilai dari $total_harga lalu dikonversikan ke int
        if ($pembayaran >= $totalharga) { // jika pembayaran lebih besar dari total harga maka 
            $kembalian = $pembayaran - $totalharga; // menghitung kembalian dengan mengurangkan pembyaran dikurang total harga
        } else { // jika lebih kecil maka menampilkan pesan pembayaran kurang 
            $kembalian = "pembayaran tidak cukup";
        }
    }

    if (isset($_POST['simpan'])) { // mengecek tombol simpan ditekan
        echo "<script>
            alert('Transaksi Berhasil Kembali Ke Home!'); 
            window.location.href = 'beranda.php';
        </script>";
    } // akan muncul pesan alert dan dipindah kan ke halaman beranda
}
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn-btn-gray {
            background-color: gray;
            border-color: gray;
            color: white;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar" style="background-color: gray;"> <!-- Navbar dengan warna pink -->
        <div class="container-fluid"> <!-- Container yang memenuhi lebar layar -->
            <div class="d-flex justify-content-between w-100"> <!-- Membuat area di dalam navbar memenuhi lebar layar dan menyusun item ke kiri dan kanan -->
                <!-- Menu kiri -->
                <div class="d-flex">
                    <a class="nav-link text-light mx-3 fs-5 py-2 px-3" href="#">Home</a> <!-- Link ke Beranda -->
                    <a class="nav-link text-light mx-3 fs-5 py-2 px-3" href="transaksi.php">Transaksi</a> <!-- Link ke halaman transaksi -->
                </div>
                <!-- Menu kanan (Logout) -->
                <a class="nav-link text-light mx-3 fs-5 py-2 px-3" href="logout.php">Logout</a> <!-- Link untuk logout -->
            </div>
        </div>
    </nav>


    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST">
                            <h3 class="text-center">TRANSAKSI</h3>

                            <div class="mb-3">
                                <label class="form-label">Nomor Transaksi</label>
                                <input type="text" class="form-control" name="notransaksi" value="<?= htmlspecialchars($notransaksi) ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tanggal Transaksi</label>
                                <input type="date" class="form-control" name="tanggal" value="<?= htmlspecialchars($tanggal) ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nama Customer</label>
                                <input type="text" class="form-control" name="namacustomer" value="<?= htmlspecialchars($namacustomer) ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Pilih HP</label>
                                <input type="text" class="form-control" value="<?= htmlspecialchars($paketTerpilih[0]) ?>" name="paket" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Harga HP</label>
                                <input type="text" class="form-control" name="harga" id="harga" value="<?= $IphoneList[$id][2] ?>" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Jumlah HP</label>
                                <input type="number" class="form-control" name="jumlah" value="<?= htmlspecialchars($jumlah) ?>" min="1" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tambahan</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tambahan" value="500000" <?= $tambahan == 500000 ? 'checked' : '' ?>>
                                    <label class="form-check-label">charger - Rp 500.000</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tambahan" value="500000" <?= $tambahan == 750000 ? 'checked' : '' ?>>
                                    <label class="form-check-label">Ipad- Rp 750.000</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tambahan" value="300000" <?= $tambahan == 300000 ? 'checked' : '' ?>>
                                    <label class="form-check-label"> case - Rp 300.000</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-btn-gray" name="hitung_total">Hitung Total Harga</button>

                            <div class="mb-3 mt-3">
                                <label class="form-label">Total Harga</label>
                                <input type="text" class="form-control" name="totalharga" value="<?= $totalharga ?>" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Pembayaran</label>
                                <input type="text" class="form-control" name="pembayaran" value="<?= $pembayaran ?>">
                            </div>

                            <button type="submit" class="btn btn-btn-gray" name="hitung_kembalian">Hitung Kembalian</button>

                            <div class="mb-3 mt-3">
                                <label class="form-label">Kembalian</label>
                                <input type="text" class="form-control" name="kembalian" value="<?= $kembalian ?>" readonly>
                            </div>

                            <button type="submit" class="btn btn-btn-gray" name="simpan">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>