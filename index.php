<?php

// Include file config
include "config.php";

// Query untuk menampilkan semua data buku
$query = "SELECT * FROM buku";
$result = $conn->query($query);
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
        <h2 class="mb-4">Data Semua Buku</h2>  
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i=1;
                while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row['judul'] ?> 
                    <br><br> 
                    <?php echo "<img src='sampul_buku/".$row['sampul_buku']."' width=100 height=100>" ?></td>
                    <td><?php echo $row['pengarang'] ?></td>
                    <td><?php echo $row['penerbit'] ?></td>
                    <td><?php echo $row['tahun_terbit'] ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id_buku']; ?>" class="btn btn-warning me-2">Edit</a>
                        <a href="delete.php?id=<?php echo $row['id_buku']; ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php
                $i++;
                }
                ?>
            </tbody>
        </table>
    </main>
    <footer class="bg-light py-3">
        <div class="container">
            <p class="text-center">&copy; 2023 Admin Perpustakaan</p>
        </div>
    </footer>
</body>
</html>