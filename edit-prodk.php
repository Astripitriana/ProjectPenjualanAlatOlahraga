<?php
session_start();
include 'koneksi.php';


$produk = mysqli_query($connect, "SELECT * FROM product WHERE product_id = '".$_GET['id']."' ");
$p = mysqli_fetch_object($produk);
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
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
</ul>


</header>
<div class="section">
    <div class="Container">
        <h3>Edit Produk</h3>
        <div class="box">
            <form action="" method="POST" enctype="multipart/form-data"></option>

               <select class ="input-username" name= "kategori" required>
                   <option value="">---Pilih---</option>

                   <?php
                   $kategori = mysqli_query($connect, "SELECT * FROM tb_category ORDER BY id_category DESC ");
                   while($r = mysqli_fetch_array($kategori)){
                   ?>

                   <option value="<?php echo $r['id_category']?>"><?php echo ($r['id_category'] == $p->id_category)? 
                   'selected' : '';?></option>
                   <?php } ?>    
                  </select>

                  <input type="text" name="nama" class="input-username" placeholeder="Nama Produk" value="<?php echo $p->product_name
                  ?>" required >
                  <input type="text" name="harga" class="input-username" placeholeder="Harga" value="<?php echo $p->product_price
                  ?>" required >
                  <img src="produk/<?php echo $p->produck_image?>" width="100px">
                  <input type="file" name="gambar" class="input-username" >
                  <input type="hidden" name="foto" value="<?php echo $p->produck_image?>">
                  <textarea class="input-username" name="deskripsi" placeholder="Deskripsi" value="<?php echo $p->product_description
                  ?>"></textarea><br>
                  <select class=" input-username" name="status">
                  <option value="">---Pilih---</option>
                  <option value="1" <?php echo ($p->product_status == 1)? 'selected':'';?>>Aktif</option>
                  <option value="0" <?php echo ($p->product_status == 0)? 'selected':'';?>>Tidak Aktif</option>
                   </select>
                <input type="submit" name="submit" value="Tambah" class="tmb">
          
</form>
        <?php
        if(isset($_POST['submit'])){


        
    }
        ?>
            
</div>
        </div>
</div>

<footer>
    <div class="container">
        <small>Copyrignt $copy; 2021 - Penjualan Alat Olahraga.</small>
    </div>
    </footer>
    <script>
         CKEDITOR.replace( 'deskripsi' );
                </script>
</body>
</html>