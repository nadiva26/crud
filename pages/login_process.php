<?php
include "../conf/conn.php"; 
session_start();

if ($_POST) {
    
    $username = htmlentities($_POST['username']);
    $password = htmlentities($_POST['password']);

    
    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ? AND password = md5(?)");
    $stmt->bind_param("ss", $username, $password); 
   
    $stmt->execute();

   
    $result = $stmt->get_result();

    if ($result->num_rows >= 1) {
      
        $row = $result->fetch_assoc();
        $_SESSION['id_admin'] = $row['id_admin'];

     
        echo '<script>alert("Selamat Datang ' . $row['username'] . '! Kamu Telah Login Ke Halaman Admin !!!");
        window.location.href="../index.php"</script>';
    } else {
   
        echo '<script>alert("Masukan Username dan Password dengan Benar !!!");
        window.location.href="login.php"</script>';
    }

    
    $stmt->close();
}

$conn->close();
?>
