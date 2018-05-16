<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Restauracja Etna - logowanie</title>
	<meta name="description" content="Najlepsza pizza w mieście" />
	<meta name="keywords" content="pizza, jedzenie, włoska kuchnia" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		
	<link rel="stylesheet" href="../css\style_log.css" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Vollkorn" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">


	
</head>

<body>
	<div id="container22">
		<h4>Konto zostało utworzone, proszę podać dane</h4>
		<form method="POST" action="..\scripts/ustaw.php">
		<input type="text" placeholder="imię" onfocus="this.placeholder=''" onblur="this.placeholder='imię'" name="imie">
		<input type="text" placeholder="nazwisko" onfocus="this.placeholder=''" onblur="this.placeholder='nazwisko'" name="nazwisko">
		<input type="text" placeholder="miasto" onfocus="this.placeholder=''" onblur="this.placeholder='miasto'" name="miasto">
		<input type="text" placeholder="ulica" onfocus="this.placeholder=''" onblur="this.placeholder='ulica'" name="ulica">
		<input type="text" placeholder="numer lokalu" onfocus="this.placeholder=''" onblur="this.placeholder='numer lokalu'" name="lokalu">
		<input type="text" placeholder="numer mieszkania" onfocus="this.placeholder=''" onblur="this.placeholder='numer mieszkania'" name="mieszkania">
		<input type="text" placeholder="kod pocztowy" onfocus="this.placeholder=''" onblur="this.placeholder='kod pocztowy'" name="kod">
		
		<input type="submit" value="Ustaw"  class="Zatwierdz" name="ustaw">
		</form> 
	</div>