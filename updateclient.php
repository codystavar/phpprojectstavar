<center>
<br><br><br>
<a href="clienti.php">Back</a> |
<a href="logoff.php">Log out</a>

<br><br>
<center><h3>Editare clienti</h3></center>
<?php
session_start();
if (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == "TRUE" && isset($_REQUEST['ID'])) {
    require("connect.php");

    if (isset($_POST["nume"]) && isset($_POST["adresa"]) &&
        strlen($_POST["nume"]) > 2 && strlen($_POST["adresa"]) > 4) {
        $query = "UPDATE clienti SET Nume='".$_POST["nume"]."', Adresa='".$_POST["adresa"]."', 
Telefon=".$_POST["telefon"].", IDFkOras=".$_POST["IDoras"]." 
WHERE IDClient=".$_POST["ID"];

        mysqli_query($db, $query);

        if (mysqli_affected_rows($db) == 1)
            echo "<script>alert('Am modificat utilizatorul!');
            window.location.href = 'clienti.php';</script>";
        else
            echo "Eroare:" . mysqli_error($db);
    }

    $query = mysqli_query($db, "SELECT * FROM clienti WHERE IDclient=".$_GET["ID"]);	

    while($result = mysqli_fetch_assoc($query)){
?>
    <form action="updateclient.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="ID" value="<?= $_GET["ID"] ?>">
        Nume: <input type="text" name="nume" value="<?= $result["Nume"] ?>"><br>
        Adresa: <input type="text" name="adresa" value="<?= $result["Adresa"] ?>"><br>
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