<center>
<br><br><br>
<a href="addservice.php">Add Service</a> |
<a href="login.php">Back</a> |
<a href="logoff.php">Log out</a>
</center>
<br>
<h2><center>Tabel servicii</h2></center>


<?php
session_start();
require("connect.php");
$query=mysqli_query($db,"SELECT IDService, NumeService, PretService FROM servicii");

?>
<table border="4" align="center" width="450">
<tr style="text-align:center;font-weight:bold">
<td>ID</td><td>Nume servicii</td><td>Pret Unitar</td><td>Misc</td><tr>

<?php
while($result=mysqli_fetch_row($query)) {
echo "<tr>";
foreach ($result as $key => $coloanacurenta )
    echo "<td>".$coloanacurenta."</td>";
	echo '<td><a href="updateservicii.php?ID='.$result[0]
      .'">'."Edit".'</td>';

}


?>