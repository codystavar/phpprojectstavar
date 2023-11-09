<center>
<br><br><br>
<a href="tehnicieni.php">Back</a> |
<a href="logoff.php">Log out</a>

<br><br>
<center><h3>Editare tehnicieni</h3></center>
<?php
session_start();
if (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == "TRUE" && isset($_REQUEST['ID'])) {
    require("connect.php");

    if (isset($_POST["numeteh"]) && isset($_POST["adresa"]) &&
        strlen($_POST["numeteh"]) > 2 && strlen($_POST["adresa"]) > 4) {
        $query = "UPDATE tehnicieni SET numeteh='".$_POST["numeteh"]."', Adresa='".$_POST["adresa"]."', 
Telefon=".$_POST["telefon"].", FKIDOras=".$_POST["IDoras"]." 
WHERE IDTehnician=".$_POST["ID"];

        mysqli_query($db, $query);

        if (mysqli_affected_rows($db) == 1)
            echo "<script>alert('Am modificat tehnicianul!');
            window.location.href = 'tehnicieni.php';</script>";
        else
            echo "Eroare:" . mysqli_error($db);
    }

    $query = mysqli_query($db, "SELECT * FROM tehnicieni WHERE IDTehnician=".$_GET["ID"]);	

    while($result = mysqli_fetch_assoc($query)){
?>
    <form action="updatehnicieni.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="ID" value="<?= $_GET["ID"] ?>">
        Nume: <input type="text" name="numeteh" value="<?= $result["numeteh"] ?>"><br>
        Sediu: <input type="text" name="adresa" value="<?= $result["Adresa"] ?>"><br>
        Telefon: <input type="text" name="telefon" value="<?= $result["Telefon"] ?>"><br>
        Oras: <select name="IDoras">
<?php
        $query = mysqli_query($db, "SELECT * FROM orase");
        while ($result = mysqli_fetch_row($query))
            echo '<option value="'.$result[0].'">'.$result[1].'</option>';
?>
    </select></br></br>
    <input type="submit" value="Update"></form>
<?php
    }
}

?>
</center>