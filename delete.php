<?php
include 'koneksi.php';
if(isset($_GET['idk'])){

    $delete =mysqli_query ($connect, "DELETE FROM tb_category WHERE id_category= '".$_GET['idk']."' ");
    echo '<script>window.location="kategori.php"</script>';

}
if(isset($_GET['idp'])){ 
    $delete = mysqli_query($connect, "DELETE FROM product WHERE product_id= '".$_GET['idp']."' ");
    echo '<script>window.location="produk.php"</script>';
}

?>
