<center>
<br><br><br>
<a href="servicii.php">Back</a> |
<a href="logoff.php">Log out</a>

<br><br>
<center><h3>Adaugare servicii</h3></center>
<?php

session_start();
if (isset($_SESSION["isAdmin"])&&$_SESSION["isAdmin"]=="TRUE"){
  require("connect.php");
echo '<form action="addservice.php" method="POST"
      enctype="multipart/form-data">
Nume Service: <input type="text" name="numeserv"><br/>
Pret Service: <input type="text" name="pretserv"><br/></br/>';
echo '<input type="submit" value="Add Service"></form>';

	}

if (isset($_POST["numeserv"])&&isset($_POST["numeserv"])
  &&strlen($_POST["pretserv"])>2&&strlen($_POST["pretserv"])>2){ 
 
	  $query=mysqli_query($db,"INSERT INTO servicii SET NumeService='".$_POST["numeserv"]."',PretService=".$_POST["pretserv"]);
			  
		if (mysqli_affected_rows($db)==1) echo "Am adaugat cu succes!";
			else echo "Eroare:".mysqli_error($db);

 }

?>
</center>