<?php include '..\header\header_log.php';?>
<div id="container">
	<?php
	session_start();
		require_once "..\scripts/connect.php";

		$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
		if ($polaczenie->connect_errno!=0)
		{
			echo "Error: ".$polaczenie->connect_errno;
		}
		 $rezultat = @$polaczenie->query("SELECT DISTINCT danie.Nazwa, danie.Cena, rozmiar.nazwa, skladnikzamowienia.idSkladnikZamowienia FROM skladnikzamowienia
inner join zamowienia on skladnikzamowienia.idZamowienia='".$_SESSION['idZamowienia'] ."'
inner join danie on skladnikzamowienia.idDania=danie.idDanie
inner join rozmiar on danie.idRozmiar=rozmiar.idRozmiar;");

if($_GET)
		{
    $id = $_GET['id'];
    $v = @$polaczenie->query ( "DELETE FROM skladnikzamowienia WHERE idSkladnikZamowienia=$id");
	header('Location: koszyk.php');
		}
		
echo <<<END
	
<div id="tytul">Twój koszyk</div>
		<div class="menu">
			<a href="panel.php">Panel Użytkownika</a><br/>
			<!--<a href="dane.php">Ustaw dane</a><br/>-->
			<a href="koszyk.php">Twój koszyk</a><br/>
			<a href="historia.php">Twoje zamówienia</a><br/>
			<a href="..\scripts/logout.php">Wyloguj się</a><br/>
			</div>

			<div id="zawartosc">
END;
			echo "<p>";
		echo "<table ><tr>";
		echo "<td ><strong> Nazwa dania</strong></td>";
		echo "<td ><strong>Cena</strong></td>";
		echo "<td ><strong>Rozmiar dania</strong></td>";
		echo "</tr>";
		$suma = 0;
		while ( $row = mysqli_fetch_row($rezultat) ) {
			echo "</tr>";
			echo "<td >" .$row[0] . "</td>";
			echo   "<td >" .$row[1] . "</td>";
			$suma+=$row[1];
			echo   "<td >" .$row[2] . "</td>";
			echo '<td ><input  class="usun"  onClick=location.href="?id='.$row[3].'"  type="submit" value="Usuń" /></td>';
			echo "</tr>";
		 }
		 echo "</table>";
		 echo "<h3>Cena:  ".$suma."</h3>";
		?>
			</div>
	
</body>
</html>


