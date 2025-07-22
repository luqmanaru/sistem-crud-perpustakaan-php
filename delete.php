<?php

// Include file config
include "config.php";

// Ambil id buku dari URL
$id_buku = $_GET['id'];

// Cek apakah form telah disubmit
if(isset($_POST['submit'])) {
    
    // Query hapus data peminjaman terlebih dahulu
    $sql_peminjaman = "DELETE FROM peminjaman WHERE id_buku=$id_buku"; 

    // Eksekusi query hapus data peminjaman
    if($conn->query($sql_peminjaman)) {
        
        // Query hapus data buku
        $sql_buku = "DELETE FROM buku WHERE id_buku=$id_buku"; 
        
        // Eksekusi query hapus data buku
        if($conn->query($sql_buku)) {
            
            // Jika berhasil hapus alihkan ke index.php 
            header("location: index.php");
        } else {
            
            // Jika gagal tampilkan pesan error
            echo "Data gagal dihapus: " . $conn->error;
        }
    } else {
        
        // Jika gagal tampilkan pesan error
        echo "Data gagal dihapus: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hapus Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2>Hapus Buku</h2>
        <p>Anda yakin ingin menghapus buku ini?</p>
        <form method="post">
            <button type="submit" name="submit" class="btn btn-danger me-2" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">Hapus</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>
