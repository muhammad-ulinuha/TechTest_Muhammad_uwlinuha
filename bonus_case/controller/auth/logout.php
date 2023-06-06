<?php 
 
session_start();
session_destroy();
 
// header("Location: ../../index.php");
echo "<script>alert('LOGOUT BERHASIL')
window.location.replace('../../index.php');</script>";
 
?>