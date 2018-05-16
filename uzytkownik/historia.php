<?php include '..\header\header_log.php';?>
<div id="container12">
	<?php
	session_start();
		require_once "..\scripts/connect.php";

		$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
		if ($polaczenie->connect_errno!=0)
		{
			echo "Error: ".$polaczenie->connect_errno;
		}
		 $rezultat = @$polaczenie->query("SELECT DISTINCT zamowienia.data, danie.Nazwa, danie.Cena, rozmiar.nazwa,  status.Status FROM skladnikzamowienia
		inner join zamowienia on skladnikzamowienia.idZamowienia=zamowienia.idZamowienie and zamowienia.idUzytkownik='".$_SESSION['idUzytkownik'] ."'
		inner join danie on skladnikzamowienia.idDania=danie.idDanie
		inner join status on skladnikzamowienia.idStatus=status.idStatus
		inner join rozmiar on danie.idRozmiar=rozmiar.idRozmiar;");
echo <<<END
	
<div id="tytul">Twoje zamówienia</div>
		<div class="menu">
			<a href="panel.php">Panel Użytkownika</a><br/>
			<!--<a href="dane.php">Ustaw dane</a><br/>-->
			<a href="koszyk.php">Twój koszyk</a><br/>
			<a href="historia.php">Twoje zamówienia</a><br/>
			<a href="..\scripts/logout.php">Wyloguj się</a><br/>
			</div>

END;
			echo "<p>";
		echo "<table ><tr>";
		echo "<td ><strong>Data</strong></td>";
		echo "<td ><strong>Nazwa</strong></td>";
		echo "<td ><strong>Cena</strong></td>";
		echo "<td ><strong>Rozmiar</strong></td>";
		echo "<td ><strong>Status</strong></td>";
		echo "</tr>";
		$suma = 0;
		while ( $row = mysqli_fetch_row($rezultat) ) {
			echo "</tr>";
			echo "<td >" .$row[0] . "</td>";
			echo "<td >" .$row[1] . "</td>";
			echo   "<td >" .$row[2] . "</td>";
			echo   "<td >" .$row[3] . "</td>";
			echo   "<td >" .$row[4] . "</td>";
			echo "</tr>";
		 }
		 echo "</table>";

		?>
	
</body>
</html>