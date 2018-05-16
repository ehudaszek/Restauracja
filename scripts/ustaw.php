<?php
session_start();
require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}


if (isset($_POST['ustaw'])) 
{
	$imie =$_POST['imie'];
	$nazwisko =$_POST['nazwisko'];
	$miasto =$_POST['miasto'];
	$ulica = $_POST['ulica'];
	$lokalu = $_POST['lokalu'];
	$mieszkania = $_POST['mieszkania'];
	$kod = $_POST['kod'];
	
	$rezultat = @$polaczenie->query("INSERT INTO dane (`idDane`, `Imie`, `Nazwisko`, `Miasto`, `Ulica`, `Kod Pocztowy`, `Numer Lokalu`, `Numer Mieszkania`)
	VALUES ('".$_SESSION['idUzytkownik'] ."', '".$imie."', '".$nazwisko."', '".$miasto."', '".$ulica."', '".$kod."', '.$lokalu.', '.$mieszkania.');");
	header('Location: ..\index.php');
}
?>
