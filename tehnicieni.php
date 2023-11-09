<center>
<br><br><br>
<a href="addtehnician.php">Add Tehnician</a> |
<a href="login.php">Back</a> |
<a href="logoff.php">Log out</a>
</center>
<br>

<h2><center>Tabel Tehnicieni</h2></center>
<?php
session_start();
require("connect.php");
$query=mysqli_query($db,"SELECT IDTehnician, numeteh, Adresa, Telefon, oras FROM tehnicieni
JOIN orase ON orase.IDOras = tehnicieni.FkIDOras");

?>
<table border="4" align="center" width="900">
<tr style="text-align:center;font-weight:bold">
<td>ID</td><td>Nume Tehnician</td><td>Sediu</td><td>Telefon</td><td>Oras</td><td>Misc</td><<tr>

<?php
while($result=mysqli_fetch_row($query)) {
echo "<tr>";
foreach ($result as $key => $coloanacurenta )
    echo "<td>".$coloanacurenta."</td>";
		echo '<td><a href="updatehnicieni.php?ID='.$result[0]
      .'">'."Edit".'</td>';

}


?>