<?php

	session_start();
	
	if(!isset($_SESSION['zalogowany']))
	$g="Zaloguj się";
	else
	$g="Twoje konto";
	?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Restauracja Etna</title>
	<meta name="description" content="Najlepsza pizza w mieście" />
	<meta name="keywords" content="pizza, jedzenie, włoska kuchnia" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Vollkorn" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">


	
</head>

<body>
	
	<header>
		<div class="logo"><a href="index.php">Restauracja Etna</a></div>
		<div class="space"></div>
		<div class="logowanie"><a href='uzytkownik/logowanie.php'><?=$g?></a></div>
	</header>
	<nav>
		<ul class="navigation">
			<il><a href="menu.php">Menu</a></il>
			<il><a href="promocje.php">Promocje</a></il>
			<il><a href="nas.php">O nas</a></il>
			<il><a href="kontakt.php">Kontakt</a></il>
		</ul>
	</nav>