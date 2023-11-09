<center>
<br><br><br>
<a href="produse.php">Back</a> |
<a href="logoff.php">Log out</a>

<br><br>
<center><h3>Editare Produse</h3></center>
<?php
session_start();
if (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == "TRUE" && isset($_REQUEST['ID'])) {
    require("connect.php");

    if (isset($_POST["numeprod"]) && isset($_POST["pretprod"]) &&
        strlen($_POST["numeprod"]) > 3 && strlen($_POST["pretprod"]) >= 1 
		&& strlen($_POST["cantitate"]) > 0) {
        $query = "UPDATE produse SET NumeProdus='".$_POST["numeprod"]."', PretProdus='".$_POST["pretprod"]."', 
		Cantitate=".$_POST["cantitate"]." WHERE IDProdus=".$_POST["ID"];

        mysqli_query($db, $query);

        if (mysqli_affected_rows($db) == 1)
            echo "<script>alert('Am modificat produsul!');
            window.location.href = 'produse.php';</script>";
        else
            echo "Eroare:" . mysqli_error($db);
    }

    $query = mysqli_query($db,"SELECT * FROM produse WHERE IDProdus=".$_GET["ID"]);	
    while($result = mysqli_fetch_assoc($query)){
?>
    <form action="updateproduse.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="ID" value="<?= $_GET["ID"] ?>">
        Nume Produs: <input type="text" name="numeprod" value="<?= $result["NumeProdus"] ?>"><br>
        Pret Produs: <input type="text" name="pretprod" value="<?= $result["PretProdus"] ?>"><br>
        Cantitate: <input type="text" name="cantitate" value="<?= $result["Cantitate"] ?>"><br>

    </select></br>
    <input type="submit" value="Update"></form>
<?php
    }
}

?>
</center>