<center>
<br><br><br>
<a href="tranzactii.php">Back</a> |
<a href="logoff.php">Log out</a>

<br><br>
<center><h3>Adaugare tranzactii</h3></center>

<?php

session_start();

if (isset($_SESSION["isAdmin"])&&$_SESSION["isAdmin"]=="TRUE"){
  require("connect.php");
echo '<form action="addtranzactii.php"
method="POST">';
echo 'Client: <select name="IDClient">';
$query=mysqli_query($db,"SELECT * FROM clienti");
while ($result=mysqli_fetch_row($query))
echo "<option value='".$result[0]."'>".$result[1]."</option>";
echo '</select></br>';
echo 'Produs: <select name="IDProdus">';
$query=mysqli_query($db,"SELECT * FROM produse");
while ($result=mysqli_fetch_row($query))
echo "<option value='".$result[0]."'>".$result[1]."</option>";
echo '</select></br>';
echo 'Serviciu: <select name="IDService">';
$query=mysqli_query($db,"SELECT * FROM servicii");
while ($result=mysqli_fetch_row($query))
echo "<option value='".$result[0]."'>".$result[1]."</option>";
echo '</select></br>';
echo 'Tehnician: <select name="IDTehnician">';
$query=mysqli_query($db,"SELECT * FROM tehnicieni");
while ($result=mysqli_fetch_row($query))
echo "<option value='".$result[0]."'>".$result[1]."</option>";
echo '</select></br>';
echo '<input type="submit" value="Add Tranzactie"></form>';
	}

if (isset($_POST["IDProdus"])&&
($_SESSION["isAdmin"])&&$_SESSION["isAdmin"]=="TRUE"){ 

		//Select si fetch pret service
		$SelectPS=mysqli_query($db,"SELECT PretService FROM servicii where IDService='".$_POST["IDService"]."'");
		$RowPS = mysqli_fetch_row($SelectPS); 
		$ValuePS = $RowPS[0];
		//Select si fetch pret produs
		$SelectPP=mysqli_query($db,"SELECT PretProdus FROM produse where IDProdus='".$_POST["IDProdus"]."'");
		$RowPP = mysqli_fetch_row($SelectPP); 
		$ValuePP = $RowPP[0];
		//total
		$total=$ValuePS+$ValuePP;
		//ia cantitate
		$SelectCant=mysqli_query($db,"SELECT Cantitate FROM produse where IDProdus='".$_POST["IDProdus"]."'");
		$RowCS = mysqli_fetch_row($SelectCant); 
		$ValueCS = $RowCS[0];
		$ValueTCS= $ValueCS-1;
		//nume produs
		$NumeSelect=mysqli_query($db,"SELECT NumeProdus FROM produse where IDProdus='".$_POST["IDProdus"]."'");
		$NumeRow = mysqli_fetch_row($NumeSelect); 
		$NumeR = $NumeRow[0]; 
		
	  $query=mysqli_query($db,"INSERT INTO tranzactii SET IDFKClient='".$_POST["IDClient"].
              "', IDFKProdus='".$_POST["IDProdus"]."',IDFKService='".$_POST["IDService"]."',
              IDFKTehnician=".$_POST["IDTehnician"].",Suma="."$total".",Data="."CURRENT_DATE()");
			$updatecant=mysqli_query($db,"UPDATE produse SET Cantitate='$ValueTCS' WHERE IDProdus=".$_POST["IDProdus"]);
			  
			  
	if (mysqli_affected_rows($db)==1) 
		echo "Am adaugat cu succes tranzactia!</br> Suma totala este: ".$total." RON</br>".
			"Mai sunt: ".$ValueTCS." bucati de ".$NumeR." ramase in stoc.";		
				else echo "Error: Posibil ca stocul sa nu fie suficient;</br> Verficati stocul valabil.".mysqli_error($db);
 }

?>
</center>