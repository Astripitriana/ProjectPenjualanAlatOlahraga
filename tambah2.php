<?php
session_start();
include 'koneksi.php';
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
        <h3>Tambah Produk</h3>
        <div class="box">
            <form action="" method="POST" enctype="multipart/form-data"></option>

               <select class ="input-username" name= "kategori" required>
                   <option value="">---Pilih---</option>

                   <?php
                   $kategori = mysqli_query($connect, "SELECT * FROM tb_category ORDER BY id_category DESC ");
                   while($r = mysqli_fetch_array($kategori)){
                   ?>

                   <option value="<?php echo $r['id_category']?>"><?php echo $r['category_name']?></option>
                   <?php } ?>    
                  </select>

                  <input type="text" name="nama" class="input-username" placeholeder="Nama Produk" required >
                  <input type="text" name="harga" class="input-username" placeholeder="Harga" required >
                  <input type="file" name="gambar" class="input-username" required >
                  <textarea class="input-username" name="deskripsi" placeholder="Deskripsi"></textarea><br>
                  <select class=" input-username" name="status">
                  <option value="">---Pilih---</option>
                  <option value="Aktif">Aktif</option>
                  <option value="Tidak aktif">Tidak Aktif</option>
                   </select>
                <input type="submit" name="submit" value="Tambah" class="tmb">
          
</form>
        <?php
        if(isset($_POST['submit'])){
           // print_r($_FILES['gambar']);
           //menampung imputan dari form
           $kategori   = $_POST['kategori'];
           $nama       = $_POST['nama'];
           $harga      = $_POST['harga'];
           $deskripsi  = $_POST['deskripsi'];
           $status     = $_POST['status'];
           
           //menampung data file yang di upload
           $filename = $_FILES['gambar']['name'];
           $tmp_name = $_FILES['gambar']['tmp_name'];
          
           $type1 = explode('.', $filename);//untuk membuat text jadi array berdsrkn tanda pemisah tertentu
           $type2 = $type1[1];

           $newname = 'produk'. time(). '.' .$type2;

           //menampung data format file yang diizinkan
           $diizinkan = array('jpg', 'jpeg', 'png', 'gif');

           //validasi format file
           if(!in_array($type2, $diizinkan)){
               echo '<script>alert("format file tidak diizinkan")</script>';
           }else{
               //jika format file sesuai dengan yang diizinkan
               //proses upload file sekaligus insert ke database


           move_uploaded_file('tmp_name', './produk/' . $newname);
          

               $insert = mysqli_query($connect, "INSERT  INTO product VALUES (
                   null,
                   '".$kategori."',
                   '".$nama."',
                   '".$harga."',
                   '".$deskripsi."',
                   '".$newname."',
                   '".$status."',
                  null
                  )");
                  
                  if($insert){
                    echo '<script>alert("Tambah Data Berhasil")</script>';
                    echo '<script>window.location="produk.php"</script>';
                  }else{
                      echo 'gagal' .mysqli_error($connet);
                  }
           }


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