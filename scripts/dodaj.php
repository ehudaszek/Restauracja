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
		$wszystko_OK=true;

		
		$nazwa = $_POST['nazwa'];
		
		if ((strlen($nazwa)<3) || (strlen($nazwa)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_login']="Nazwa musi posiadać od 3 do 20 znaków!";
		}
		
		if (ctype_alnum($nazwa)==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_login']="Nazwa może składać się tylko z liter i cyfr (bez polskich znaków)";
		}
		
		$cena = $_POST['cena'];

		
		if (is_numeric($cena)==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_email']="Podaj poprawną cene!";
		}
		
		//Sprawdź poprawność hasła
		$kategoria = $_POST['kategoria'];
		$rozmiar = $_POST['rozmiar'];
		
		if (($kategoria>4) || ($kategoria<0))
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Podaj poprawną kategorię";
		}
		
		if (($rozmiar>4) || ($rozmiar<0))
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo1']="Podaj poprawny rozmiar";
		}
		
		$opis = $_POST['opis'];
		

		
		//Zapamiętaj wprowadzone dane
		$_SESSION['fr_login'] = $nazwa;
		$_SESSION['fr_email'] = $cena;
		$_SESSION['fr_haslo1'] = $kategoria;
		$_SESSION['fr_haslo2'] = $rozmiar;
		$_SESSION['fr_haslo3'] = $opis;
		
		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
				if ($wszystko_OK==true)	
				{
					if ($rezutlat=$polaczenie->query("INSERT INTO danie (`Nazwa`, `Cena`, `idKategoria`, `idRozmiar`, `Opis`) VALUES ('".$nazwa."', '".$cena."','".$kategoria."','".$rozmiar."','".$opis."');"))
					{
						
						$_SESSION['udanarejestracja']=true;
						header('Location: ..\admin\admin.php');
					}
					else
					{
						echo "Error: ".$polaczenie->connect_errno;
						var_dump($rezutlat);
					}
				}
					else{
						
					}
			//header('Location: ..\dodaj.php');
			$polaczenie->close();
			}
			

	
	
?>
