<center>
<br><br><br>
<a href="orase.php">Back</a> |
<a href="logoff.php">Log out</a>

<br><br>
<center><h3>Adaugare oras</h3></center>
<?php

session_start();
if (isset($_SESSION["isAdmin"])&&$_SESSION["isAdmin"]=="TRUE"){
  require("connect.php");
echo '<form action="addoras.php" method="POST"
      enctype="multipart/form-data">
Nume Oras: <input type="text" name="numeoras"><br/><br/>';
echo '<input type="submit" value="Add Oras"></form>';
	}

if (isset($_POST["numeoras"])&&strlen($_POST["numeoras"])>3){ 
 
	  $query=mysqli_query($db,"INSERT INTO orase SET oras='".$_POST["numeoras"]."'");
	  
		if (mysqli_affected_rows($db)==1) echo "Am adaugat cu succes!";
			else echo "Eroare:".mysqli_error($db);

 }

?>
</center>