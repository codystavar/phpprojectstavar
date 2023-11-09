<center>
<br><br><br>
<a href="orase.php">Back</a> |
<a href="logoff.php">Log out</a>

<br><br>
<center><h3>Editare Orase</h3></center>
<?php
session_start();
if (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == "TRUE" && isset($_REQUEST['ID'])) {
    require("connect.php");

    if (isset($_POST["oras"]) && strlen($_POST["oras"]) >= 3) {
        $query = "UPDATE orase SET oras='".$_POST["oras"]."' WHERE idoras=".$_POST["ID"];
		
        mysqli_query($db, $query);

        if (mysqli_affected_rows($db) == 1)
            echo "<script>alert('Am modificat orasul!');
            window.location.href = 'orase.php';</script>";
        else
            echo "Eroare:" . mysqli_error($db);
    }

    $query = mysqli_query($db,"SELECT * FROM orase WHERE IDOras=".$_GET["ID"]);	
    while($result = mysqli_fetch_assoc($query)){
?>
    <form action="updateorase.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="ID" value="<?= $_GET["ID"] ?>">
        Oras: <input type="text" name="oras" value="<?= $result["oras"] ?>"><br>

    </select></br>
    <input type="submit" value="Update"></form>
<?php
    }
}

?>
</center>