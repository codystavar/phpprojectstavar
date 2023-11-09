<?php
if (empty($_SESSION)) session_start();
if(isset($_SESSION["isAdmin"])&&$_SESSION["isAdmin"]=="TRUE"){
?>
<a href="clienti.php">Clienti</a> |
<a href="tranzactii.php">Tranzactii</a> |
<a href="produse.php">Produse</a> |
<a href="servicii.php">Servicii</a> |
<a href="tehnicieni.php">Tehnicieni</a> |
<a href="orase.php">Orase</a> |
<a href="logoff.php">Log out</a><br/><br/>
<?php
}

?>
