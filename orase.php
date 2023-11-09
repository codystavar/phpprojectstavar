<center>
<br><br><br>
<a href="addoras.php">Add Oras</a> |
<a href="login.php">Back</a> |
<a href="logoff.php">Log out</a>
</center>

<center><h2>Tabel Orase</h2></center>
<?php
session_start();
require("connect.php");
$query=mysqli_query($db,"SELECT IDoras, oras FROM orase ORDER by IDoras");

?>
<table border="4" align="center" width="300">
<tr style="text-align:center;font-weight:bold">
<td>ID</td><td>Oras</td><td>Misc</td><tr>

<?php
while($result=mysqli_fetch_row($query)) {
echo "<tr>";
foreach ($result as $key => $coloanacurenta )
    echo "<td>".$coloanacurenta."</td>";
	echo '<td><a href="updateorase.php?ID='.$result[0]
      .'">'."Edit".'</td>';
}


?>