<?php
session_start();
include 'koneksi.php';
$kategori = mysqli_query($connect, "SELECT * FROM tb_category WHERE id_category = '".$_GET['id']."'");
if(mysqli_num_rows($kategori) == 0){
    echo '<script>window.location="kategori.php"</script>';
}
$k = mysqli_fetch_object($kategori);

?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
        <div class="Container">
        <h1><a href="dashboard.php">Penjualan Alat Olahraga</a></h1>
        <ul>
            <li><a href="dashboard.php">Dashboard</a><li>
                <li><a href="kategori.php">Data Kategori</a></li>
                <li><a href="data-produk.php">Data Produk</a><li>
                <li><a href="logout.php">Keluar</a><li>
</ul>
</ul>


</header>
<div class="section">
    <div class="Container">
        <h3>Edit Kategori</h3>
        <div class="box">
            <form action="" method="POST">
                <input type="text" name="nama" placeholder="Tambah Data" class="input-username" value="<?php echo $k->category_name ?>" required>
                <input type="submit" name="submit" value="Tambah" class="tmb">
</form>
        <?php
        if(isset($_POST['submit'])){
            $nama = ($_POST['nama']);
         
        $update = mysqli_query($connect, "UPDATE tb_category SET 
                               category_name = '".$nama."' 
                               WHERE id_category = '".$k->id_category."'");
        if($update){
            echo '<script>alert("Edit data berhasil")</script>';
            echo '<script>window.location="kategori.php"</script>';
        }else{
            echo 'gagal '.mysqli_error($connect);
        }
        }
        ?>
            
</div>
        </div>
</div>
</body>
</html>