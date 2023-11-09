<?php
error_reporting(0);

function dashboard($user){
    echo "<center><br/><br/><br/><br/><font-size: 24px>Bine ai venit, ".$user.". Urmatoarele optiuni sunt valabile:</br></br>";
	  include("meniu.php");
}
?>
<?php

session_start();
if (isset($_POST["user"])&&isset($_POST["pass"])
  &&strlen($_POST["user"])>2&&strlen($_POST["pass"])>2){

    require("connect.php");
    $stringquery="SELECT * FROM clienti WHERE nume='"
      .$_POST["user"]."' AND password=md5('".$_POST["pass"]."')";
    $query=mysqli_query($db,$stringquery);

    if (mysqli_num_rows($query)) {

        if ($_POST["user"]=="Admin"){
        session_start();
        $_SESSION["isAdmin"]="TRUE";
        dashboard($_POST["user"]);
      }
        }
      else {
        echo "<script>alert('User/Password incorrect. Please try again.');
        window.location.href='login.php';
        </script>";

        //echo mysqli_error($db);
      //  header("Location:login.php");
          }
  }
//fputs($fp,$_POST["user"].",".$_POST["pass"]."\r\n";
  else if (isset($_SESSION["isAdmin"])&&$_SESSION["isAdmin"]=="TRUE"){
    dashboard("Admin");
  }

  else echo '<center><form action="login.php" method="POST"><br><br/><br/><br/><br/>
  User: <input type="user" name="user"><br/><br/>
  Pass: <input type="password" name="pass"><br/><br/>
  <input type="submit" value="Login">';

?>
