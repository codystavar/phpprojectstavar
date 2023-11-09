<center>
<br><br><br>
<a href="produse.php">Back</a> |
<a href="logoff.php">Log out</a>

<br><br>
<center><h3>Adaugare produse</h3></center>
<?php

session_start();
if (isset($_SESSION["isAdmin"])&&$_SESSION["isAdmin"]=="TRUE"){
  require("connect.php");
echo '<form action="addproduse.php" method="POST"
      enctype="multipart/form-data">
Nume Produs: <input type="text" name="numeprod"><br/>
Pret Produs: <input type="text" name="pretprod"><br/>
Cantitate: <input type="text" name="cantitate"><br/>';
echo '<input type="submit" value="Add Produs"></form>';

	}

if (isset($_POST["numeprod"])&&isset($_POST["pretprod"])
  &&strlen($_POST["numeprod"])>2&&strlen($_POST["pretprod"])>2){ 
 
	  $query=mysqli_query($db,"INSERT INTO produse SET NumeProdus='".$_POST["numeprod"].
              "', PretProdus='".$_POST["pretprod"]."',Cantitate=".$_POST["cantitate"]);
			  
		if (mysqli_affected_rows($db)==1) echo "Am adaugat cu succes!";
			else echo "Eroare:".mysqli_error($db);

 }

?>
</center>