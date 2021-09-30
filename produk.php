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
    <h3>Produk </h3>
    <div class="box">
        <p><a href="tambah2.php">Tambah Data</a></p>
        <table border="1" cellspacing="0" class="tablektg">
        <thead>
        <tr>
        <th width="60px">No</th>
        <th>Kategori</th>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Deskripsi</th>
        <th>Gambar</th>
        <th>Status</th>
        <th width="200px">Aksi</th>
        </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $produk = mysqli_query($connect, "SELECT * FROM product LEFT JOIN tb_category USING (id_category)
            ORDER BY product_id DESC");
            if(mysqli_num_rows($produk) > 0){
            while($row = mysqli_fetch_array($produk)){

            
            ?>
            <tr>
            <td><?php echo $no++?></td>
            <td><?php echo $row['category_name'] ?></td>
            <td><?php echo $row['product_name'] ?></td>
            <td>Rp. <?php echo number_format($row['product_price']) ?></td>
            <td><?php echo $row['product_description'] ?></td>
            <td><img src="produk/<?php echo $row['produck_image']?>" width="50px"></td>
            <td><?php echo ($row['product_status'] == 0)? 'Tidak Aktif' :'Aktif'; ?></td>
            <td>
                <a href="edit-prodk.php?id=<?php echo $row['product_id']?>">Edit</a> || 
                <a href="delete.php?idp=<?php echo $row['product_id']?>" onclick="return confirm('Yakin Ingin Menghapus?')">Hapus</a>
             </td></tr>
                <?php }}else{ ?>
                <tr>
                    <td colspan="8">Tidak ada data</td>

                    <?php }?>
        </tbody>
        </table>
           
</div>
        </div>
</div>
</body>
</html>