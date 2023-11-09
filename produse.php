<center>
<br><br>

<a href="addproduse.php">Add Produse</a> |
<a href="login.php">Back</a> |
<a href="logoff.php">Log out</a>
</center>

<center><h2>Tabel Produse</h3></center>


<?php
session_start();
require("connect.php");
$query=mysqli_query($db,"SELECT * FROM produse");

?>
<table border="4" align="center" width="550">
<tr style="text-align:center;font-weight:bold">
<td>ID</td><td>Nume Produs</td><td>Pret Unitar</td><td>Cantitate</td><td>Misc</td><tr>

<?php
while($result=mysqli_fetch_row($query)) {
echo "<tr>";
foreach ($result as $key => $coloanacurenta )
    echo "<td>".$coloanacurenta."</td>";
		echo '<td><a href="updateproduse.php?ID='.$result[0]
      .'">'."Edit".'</td>';

}


?>