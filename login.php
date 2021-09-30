
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body id="bg-login">
    <div class="box-login">
        <h2> Login </h2>
        <form action="" method="POST">
        
            <input type="text" name="username" placeholder="Username" class="input-username">
            <input type="password" name="password" placeholder="Password" class="input-username">
            <input type="submit" name="submit" value="Login" class="submit"> 
</form>
<?php
if(isset($_POST['submit'])){
    session_start();
    include 'koneksi.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
  
        $cek = mysqli_query($connect, "SELECT * FROM admin WHERE username = '".$username." ' AND password = '".($password)."'");
        
        if(mysqli_num_rows($cek) > 0){//ungsinya ialah untuk mengetahui seberapa banyak baris data dari query yang kita lakukan ke database.
            echo '<script>window.location="dashboard.php"</script>';
        }else{
            echo '<script>alert("Username atau password anda salah!")</script>'; 
           
           
        }
       
    }

    
?>
</div>
</body>
</html>