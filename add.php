<?php

// Data form telah dikirim
if (isset($_POST['submit'])) {

    // Include file koneksi
    include "config.php";

    // Ambil data dari form
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];

    // Cek gambar
    if (isset($_FILES['sampul_buku']) && $_FILES['sampul_buku']['error'] == 0) {
        $sampul_buku = $_FILES['sampul_buku']['name'];
        $target_dir = "sampul_buku/";
        $target_file = $target_dir . basename($_FILES["sampul_buku"]["name"]);
        move_uploaded_file($_FILES["sampul_buku"]["tmp_name"], $target_file);
    } else {
        $sampul_buku = "";
    }

    // Query insert data buku baru
    $sql = "INSERT INTO buku (judul, sampul_buku, pengarang, penerbit, tahun_terbit) 
            VALUES ('$judul', '$sampul_buku', '$pengarang', '$penerbit', '$tahun_terbit')";

    // Eksekusi query
    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success" role="alert">Data buku baru berhasil ditambahkan</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Error: ' . $sql . '<br>' . $conn->error . '</div>';
    }
    // Menutup koneksi
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <header class="bg-light py-3">
        <div class="container">
            <h1 class="text-center">Admin Perpustakaan</h1>
            <nav class="my-2">
                <a href="index.php" class="btn btn-primary me-2">Home</a>
                <a href="add.php" class="btn btn-primary me-2">Tambah Buku</a>
            </nav>
        </div>
    </header>
    <main class="container my-4">
        <h2 class="mb-4">Tambah Buku Baru</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Buku:</label>
                <input type="text" class="form-control" id="judul" name="judul">
            </div>
            <div class="mb-3">
                <label for="pengarang" class="form-label">Pengarang:</label>
                <input type="text" class="form-control" id="pengarang" name="pengarang">
            </div>
            <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit:</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit">
            </div>
            <div class="mb-3">
                <label for="tahun_terbit" class="form-label">Tahun Terbit:</label>
                <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit">
            </div>
            <div class="form-group">
                <label for="File">Sampul Buku:</label>
                <input type="file" class="form-control-file" name="sampul_buku">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
        </form>
    </main>
    <footer class="bg-light py-3">
        <div class="container">
            <p class="text-center">&copy; 2023 Admin Perpustakaan</p>
        </div>
    </footer>
</body>
</html>