<center>
<br><br><br>
<a href="addtranzactii.php">Add Tranzactie</a> |
<a href="login.php">Back</a> |
<a href="logoff.php">Log out</a>
</center>
<br>
<center><h2>Tabel tranzactii</h2></center>


<?php
session_start();
require("connect.php");
$query=mysqli_query($db,"SELECT IDTranzactie, nume, numeprodus, numeservice, numeteh, Suma, Data FROM Tranzactii
JOIN clienti ON clienti.IDClient = tranzactii.IDFKClient JOIN produse ON produse.IDProdus = tranzactii.IDFKProdus
JOIN servicii ON servicii.IDService = tranzactii.IDFKService JOIN tehnicieni ON tehnicieni.IDTehnician = tranzactii.IDFKTehnician
ORDER BY IDTranzactie");

?>
<table border="4" align="center" width="800">
<tr style="text-align:center;font-weight:bold">
<td>ID</td><td>Nume</td><td>Produs</td><td>Service</td><td>Tehnician</td><td>Suma</td><td>Data</td><tr>

<?php
while($result=mysqli_fetch_row($query)) {
echo "<tr>";
foreach ($result as $key => $coloanacurenta )
    echo "<td>".$coloanacurenta."</td>";

}


?>