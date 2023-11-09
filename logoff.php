<?php
session_start();
$_SESSION["isAdmin"]=="FALSE";
unset($_SESSION["isAdmin"]);
echo "<script>alert('Sucessfully logged out.');
  window.location.href='login.php';
  </script>";

?>
