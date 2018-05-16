<?php include '..\header/header_log.php';?>
<div id="container11">
	<?php
	session_start();
		require_once "..\scripts/connect.php";

		$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
		if ($polaczenie->connect_errno!=0)
		{
			echo "Error: ".$polaczenie->connect_errno;
		}
		 $rezultat = @$polaczenie->query("SELECT Distinct  zamowienia.idZamowienie, uzytkownicy.login, zamowienia.data,kategoria.nazwa, danie.nazwa, danie.cena, rozmiar.nazwa, status.Status, skladnikzamowienia.idSkladnikZamowienia
		 from zamowienia
		 inner join uzytkownicy on zamowienia.idUzytkownik=uzytkownicy.idUzytkownik
		 inner join dane on uzytkownicy.idDane=uzytkownicy.idDane
		 inner join skladnikzamowienia on  skladnikzamowienia.idZamowienia=zamowienia.idZamowienie
		inner join restauracja.danie on skladnikzamowienia.idDania=danie.idDanie
		inner join restauracja.rozmiar on danie.idRozmiar=rozmiar.idRozmiar
		inner join kategoria on danie.idKategoria=kategoria.idKategoria
		inner join status on skladnikzamowienia.idStatus=status.idStatus
		order by zamowienia.idZamowienie");
		
		if($_GET)
		{

			$id = $_GET['id'];
			$wynik=@$polaczenie->query("SELECT idStatus FROM skladnikzamowienia where idSkladnikZamowienia=$id ;");
			$row = mysqli_fetch_row($wynik);
			if($row[0] == "1")
			@$polaczenie->query ( "UPDATE skladnikzamowienia SET idStatus='2' where idSkladnikZamowienia=$id;");
			else if($row[0]  == "2")
			@$polaczenie->query ( "UPDATE skladnikzamowienia SET idStatus='3' where idSkladnikZamowienia=$id;");
			
			else if($row[0]  == "3")
			@$polaczenie->query ("UPDATE skladnikzamowienia SET idStatus='4' where idSkladnikZamowienia=$id;");
			
			header('Location: zamowienia.php');
		}
		
		


echo <<<END
	
<div id="tytul">Lista zamónień</div>
		<div class="menu1">
			<a href="admin.php">Panel Administratora</a><br/>
			<a href="lista.php">Lista użytkowników</a><br/>
			<a href="zamowienia.php">Lista zamówień</a><br/>
			<a href="dodaj.php">Dodaj danie</a><br/>
			<a href="..\scripts/logout.php">Wyloguj się</a><br/>
			</div>

			
END;
			echo "<p>";
		echo "<table ><tr>";
		echo "<td ><strong>Id</strong></td>";
		echo "<td ><strong>Login</strong></td>";
		echo "<td ><strong>Data Złożenia</strong></td>";
		echo "<td ><strong>Rodzaj</strong></td>";
		echo "<td ><strong>Nazwa</strong></td>";
		echo "<td ><strong>Cena</strong></td>";
		echo "<td ><strong>Rozmiar</strong></td>";
		echo "<td ><strong>Status</strong></td>";
		echo "</tr>";
		while ( $row = mysqli_fetch_row($rezultat) ) {
			echo "</tr>";
			echo "<td >" .$row[0] . "</td>";
			echo   "<td >" .$row[1] . "</td>";
			echo   "<td >" .$row[2] . "</td>";
			echo	"<td >" . $row[3] . "</td>";
			echo	"<td >" . $row[4] . "</td>";
			echo	"<td >" . $row[5] . "</td>";
			echo	"<td >" . $row[6] . "</td>";
			echo	"<td >" . $row[7] . "</td>";
			echo '<td ><input  class="usun"  onClick=location.href="?id='.$row[8].'"  type="submit" value="Zmień" /></td>';
			echo "</tr>";
		 }
		 echo "</table>";
		?>

			
	
</body>
</html>