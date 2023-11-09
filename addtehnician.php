<center>
<br><br><br>
<a href="tehnicieni.php">Back</a> |
<a href="logoff.php">Log out</a>

<br><br>
<center><h3>Adaugare tehnician</h3></center>
<?php

session_start();
if (isset($_SESSION["isAdmin"])&&$_SESSION["isAdmin"]=="TRUE"){
  require("connect.php");
echo '<form action="addtehnician.php" method="POST"
      enctype="multipart/form-data">
Nume: <input type="text" name="numeteh"><br/>
Sediu: <input type="text" name="sediu"><br/>
Telefon: <input type="text" name="telefon"><br/>';
echo 'Oras: <select name="IDoras">';
$query=mysqli_query($db,"SELECT * FROM orase");
while ($result=mysqli_fetch_row($query))
echo "<option value='".$result[0]."'>".$result[1]."</option>";
echo '</select></br></br>';
echo '<input type="submit" value="Add user"></form>';
	}

if (isset($_POST["numeteh"])&&isset($_POST["sediu"])
  &&strlen($_POST["numeteh"])>2&&strlen($_POST["sediu"])>2){ 
 
	  $query=mysqli_query($db,"INSERT INTO tehnicieni SET numeteh='".$_POST["numeteh"]."',
			Adresa='".$_POST["sediu"]."',Telefon=".$_POST["telefon"].",FkIDOras=".$_POST["IDoras"]);
			  
			  
		if (mysqli_affected_rows($db)==1) echo "Am adaugat cu succes!";
			else echo "Eroare:".mysqli_error($db);

 }

?>
</center>