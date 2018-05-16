<?php
session_start();

	require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		
		var_dump($id);
		$rezultat = @$polaczenie->query("INSERT INTO `skladnikzamowienia` (`idZamowienia`, `idDania`) VALUES ( '1','".$name."');");
		//header('Location: ..\menu.php');
		$polaczenie->close();
	}
?>