<center>
<br><br><br>
<a href="servicii.php">Back</a> |
<a href="logoff.php">Log out</a>

<br><br>
<center><h3>Editare Servicii</h3></center>
<?php
session_start();
if (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == "TRUE" && isset($_REQUEST['ID'])) {
    require("connect.php");

    if (isset($_POST["numeserv"]) && isset($_POST["pretserv"]) &&
        strlen($_POST["numeserv"]) > 1 && strlen($_POST["pretserv"]) >= 2) {
        $query = "UPDATE servicii SET NumeService='".$_POST["numeserv"]."',
		PretService=".$_POST["pretserv"]." WHERE IDService=".$_POST["ID"];
		
        mysqli_query($db, $query);

        if (mysqli_affected_rows($db) == 1)
            echo "<script>alert('Am modificat serviciul!');
            window.location.href = 'servicii.php';</script>";
        else
            echo "Eroare:" . mysqli_error($db);
    }

    $query = mysqli_query($db,"SELECT * FROM servicii WHERE IDService=".$_GET["ID"]);	
    while($result = mysqli_fetch_assoc($query)){
?>
    <form action="updateservicii.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="ID" value="<?= $_GET["ID"] ?>">
        Nume Produs: <input type="text" name="numeserv" value="<?= $result["NumeService"] ?>"><br>
        Pret Produs: <input type="text" name="pretserv" value="<?= $result["PretService"] ?>"><br>

    </select></br>
    <input type="submit" value="Update"></form>
<?php
    }
}

?>
</center>