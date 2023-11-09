<center>
<br><br><br>
<a href="clienti.php">Back</a> |
<a href="logoff.php">Log out</a>

<br><br>
<center><h3>Adaugare clienti</h3></center>
<?php

session_start();
if (isset($_SESSION["isAdmin"])&&$_SESSION["isAdmin"]=="TRUE"){
  require("connect.php");
echo '<form action="addclient.php" method="POST"
      enctype="multipart/form-data">
User: <input type="text" name="user"><br/>
Pass: <input type="password" name="pass"><br/>
Adresa: <input type="text" name="adresa"><br/>
Telefon: <input type="text" name="telefon"><br/>';
echo 'Oras: <select name="IDoras">';
$query=mysqli_query($db,"SELECT * FROM orase");
while ($result=mysqli_fetch_row($query))
echo "<option value='".$result[0]."'>".$result[1]."</option>";
echo '</select></br></br>';
echo '<input type="submit" value="Add user"></form>';
}

if (isset($_POST["user"])&&isset($_POST["pass"])
  &&strlen($_POST["user"])>2&&strlen($_POST["pass"])>2){ 
 
	  $query=mysqli_query($db,"INSERT INTO clienti SET Nume='".$_POST["user"].
              "', password=MD5('".$_POST["pass"]."'),Adresa='".$_POST["adresa"]."',
              Telefon=".$_POST["telefon"].",IDFkOras=".$_POST["IDoras"]);
			  
			  
		if (mysqli_affected_rows($db)==1) echo "Am adaugat cu succes!";
			else echo "Eroare:".mysqli_error($db);

 }

?>
</center>