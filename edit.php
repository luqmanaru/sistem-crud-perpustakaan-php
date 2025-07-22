<?php

// Include file config
include "config.php";

// Cek id buku yang akan diedit
if(!isset($_GET['id'])) {
    header("location: index.php");    
} else {
    $id_buku = $_GET['id']; 
}

// Ambil data buku dari database
$sql = "SELECT * FROM buku WHERE id_buku=$id_buku";
$result = $conn->query($sql); 
if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}

// Cek submit form perubahan data  
if(isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $sampul_buku = $_FILES['sampul_buku']['name'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    
    // Update data buku
    $sql = "UPDATE buku SET 
            judul='$judul', 
            pengarang='$pengarang',
            penerbit='$penerbit',
            tahun_terbit ='$tahun_terbit' ";
    if(!empty($sampul_buku)){
        $sql .= ", sampul_buku='$sampul_buku' ";
    }
    $sql .= "WHERE id_buku=$id_buku";
            
    // Eksekusi query  
    if($conn->query($sql)) {
        if(!empty($sampul_buku)){
            move_uploaded_file($_FILES['sampul_buku']['tmp_name'], 'sampul_buku/'.$sampul_buku);
        }
        header("location: index.php"); 
    } else {
        echo "Gagal edit data: " . $conn->error;
    }
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
    <div class="container mt-5">
        <h2>Edit Data Buku</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Buku:</label>
                <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $row['judul']; ?>">
            </div>
            <div class="mb-3">
                <label for="pengarang" class="form-label">Pengarang:</label>
                <input type="text" class="form-control" id="pengarang" name="pengarang" value="<?php echo $row['pengarang']; ?>">
            </div>
            <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit:</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?php echo $row['penerbit']; ?>">
            </div>
            <div class="mb-3">
                <label for="tahun_terbit" class="form-label">Tahun Terbit:</label>
                <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" value="<?php echo $row['tahun_terbit']; ?>">
            </div>
            <div class="form-group">
                <label for="File">Sampul Buku:</label>
                <input type="file" class="form-control-file" name="sampul_buku">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update Data</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>