<center>
<br><br><br>
<a href="addclient.php">Add Client</a> |
<a href="login.php">Back</a> |
<a href="logoff.php">Log out</a>
</center>
<br>


<?php
session_start();
require("connect.php");
$query=mysqli_query($db,"SELECT clienti.IDClient as ID,Nume,Adresa,Telefon,oras FROM clienti 
JOIN orase ON orase.IDoras=clienti.IDFkOras");

?>
<center><h2>Tabel Clienti</h2></center> 
<table border="4" align="center" width="900">
<tr style="text-align:center;font-weight:bold">
<td>ID</td><td>Nume</td><td>Adresa</td><td>Telefon</td><td>Oras</td><td>Misc</td><tr>

<?php
while($result=mysqli_fetch_row($query)) {
echo "<tr>";
foreach ($result as $key => $coloanacurenta )
    echo "<td>".$coloanacurenta."</td>";
	echo '<td><a href="updateclient.php?ID='.$result[0]
      .'">'."Edit".'</td>';

}


?>