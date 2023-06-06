<?php

include '../../config.php';

// if (isset($_SESSION['username'])) {
//     header("Location: berhasil_login.php");
// }
 
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        // header("Location: ../../view/dashboard.php");
        echo "<script>alert('LOGIN BERHASIL')
        window.location.replace('../../view/dashboard.php');</script>";
    } else {
        echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')
        window.location.replace('../../index.php');</script>";
        // header("Location: ../index.php");
    }
}


?>