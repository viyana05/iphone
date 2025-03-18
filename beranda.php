<?php
$IphoneList = array(
    array("Iphone 14 Pro Max", "Biru 128 GB", 16125000,  "iphone14promax.jpg"),
    array("Iphone 11", "Putih 128 GB", 5000000, "iphone11.jpg"),
    array("Iphone 12 pro", "Black 256 GB", 10500000, "iphone12pro.jpg"),
    array("Iphone 14 Pro", "biru 128 GB", 14125000, "iphone14pro.jpg"),
    array("Iphone 11 Pro", "Gray 128 GB", 6000000, "iphone11pro.jpg"),
    array("Iphone 12 Pro Max", "White 256 GB", 11500000, "iphone12promax.jpg")
);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8"> <!-- Menentukan karakter encoding halaman -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Membuat halaman responsif -->
    <title>Daftar Paket Wisata</title> <!-- Judul halaman -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Menggunakan Bootstrap untuk tampilan yang lebih rapi -->
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
                    <a class="nav-link text-light mx-3 fs-5 py-2 px-3" href="beranda.php">Home</a> <!-- Link ke Beranda -->
                    <a class="nav-link text-light mx-3 fs-5 py-2 px-3" href="transaksi.php">Transaksi</a> <!-- Link ke halaman transaksi -->
                </div>
                <!-- Menu kanan (Logout) -->
                <a class="nav-link text-light mx-3 fs-5 py-2 px-3" href="logout.php">Logout</a> <!-- Link untuk logout -->
            </div>
        </div>
    </nav>


    <!-- Content utama -->
    <div class="mb-4 p-0"> <!-- Section dengan latar belakang terang, tanpa padding di bagian atas dan bawah -->
        <div class="container-fluid p-0"> <!-- Container full-width tanpa padding -->
            <img src="img/banner.jpeg" class="img-fluid w-100" alt="" style="height: 500px; object-fit: cover; border-radius: 10px;">
            <!-- Gambar banner dengan lebar 100%, tinggi 200px, objek gambar disesuaikan untuk mengisi area -->
        </div>
    </div>

    <!-- Daftar Iphone -->
    <div class="container-fluid mt-5">
        <h2 class="text-left mb-4">Daftar Iphone SMK ISFI</h2>
        <div class="row row-cols-lg-3 row-cols-md-3 row-cols-sm-2 g-3"> <!-- 3 kartu per baris di desktop, 2 di tablet -->
            <?php foreach (array_slice($IphoneList, 0, 6) as $index => $paket) : ?> <!-- Ambil hanya 6 item -->
                <div class="col d-flex justify-content-center"> <!-- Pusatkan kartu dalam kolom -->
                    <div class="card h-100" style="max-width: 450px;"> <!-- Batasi lebar kartu -->
                        <img src="img/<?= $paket[3] ?>" class="card-img-top" alt="gambar" style="height: 450px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= $paket[0] ?></h5>
                            <p class="card-text"><?= $paket[1] ?></p>
                            <p class="card-text"><strong>Rp <?= number_format($paket[2], 0, ',', '.') ?></strong></p> <!-- membuat format rupiah -->
                            <!-- Menampilkan Harga dengan format pemisah ribuan dan desimal -->
                            <a href="transaksi.php?id=<?= $index ?>" class="btn btn-btn-gray mt-auto">Pilih</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>

</html>