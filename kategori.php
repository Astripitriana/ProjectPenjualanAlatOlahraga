<?php
session_start();
include 'koneksi.php';
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>kategori</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
        <div class="Container">
        <h1><a href="dashboard.php">Penjualan Alat Olahraga</a></h1>
        <ul>
            <li><a href="dashboard.php">Dashboard</a><li>
                <li><a href="kategori.php">Data Kategori</a></li>
                <li><a href="produk.php">Data Produk</a><li>
                <li><a href="logout.php">Keluar</a><li>

</ul>
</header>
<div class="section">
    <div class="Container">
    <h3>Data Kategori</h3>
    <div class="box">
        <p><a href="tambah.php">Tambah Data</a></p>
        <table border="1" cellspacing="0" class="tablektg">
        <thead>
        <tr>
        <th width="60px">No</th>
        <th>Kategori</th>
        <th width="200px">Aksi</th>
        </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $kategori = mysqli_query($connect, "SELECT*FROM tb_category ORDER BY id_category DESC");
            while($row = mysqli_fetch_array($kategori)){//Fungsi ini akan menangkap data dari hasil perintah query dan membentuknya ke dalam array asosiatif dan array numerik

            
            ?>
            <tr>
            <td><?php echo $no++?></td>
            <td><?php echo $row['category_name'] ?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id_category']?>">Edit</a> || 
                <a href="delete.php?idk=<?php echo $row['id_category']?>" onclick="return confirm('Yakin Ingin Menghapus?')">Hapus</a>|| </td></tr>
                <?php } ?>
        </tbody>
        </table>
           
</div>
        </div>
</div>
</body>
</html>