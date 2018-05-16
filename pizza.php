<?php include 'header/header.php';

require_once "scripts/connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	$idZamowienia=mysqlI_fetch_row($polaczenie->query("SELECT idZamowienie FROM zamowienia
	inner join uzytkownicy ON zamowienia.idUzytkownik = uzytkownicy.idUzytkownik ORDER BY idZamowienie DESC LIMIT 1;"));
	$_SESSION['idZamowienia'] =$idZamowienia[0];
	
	if($_GET){
	$id = $_GET['id'];
	$polaczenie->query("INSERT INTO skladnikzamowienia (`idZamowienia`,`idDania`) VALUES ('".$idZamowienia[0]."',".$id.");");
	}
	$rezultat = @$polaczenie->query("SELECT nazwa,cena,opis,idDanie FROM restauracja.danie where idKategoria=1;");
echo <<<END
	<article>
		<div class="container">
			<div class="pizzaContainer">
				<h3>Duża Średnia Mała</h3>
				<div style="clear:both;"></div>
				<h3>50cm 40cm 30cm</h3>
				<br/>
					<ul class= "meni">
END;
$i=1;
				while ( $row = mysqli_fetch_row($rezultat)){
					echo '<il><span class="tytul">'.$row[0].'</span>';
					echo '<input  class="cena1"  onClick=location.href="?id='.$row[3].'" type="submit" value='.$row[1].' />';
					$row = mysqli_fetch_row($rezultat);
					$i++;
					echo '<input  class="cena1"  onClick=location.href="?id='.$row[3].'" type="submit" value='.$row[1].' />';
					$row = mysqli_fetch_row($rezultat);
					$i++;
					echo '<input  class="cena1"  onClick=location.href="?id='.$row[3].'" type="submit" value='.$row[1].' />';
					echo "<p>".$row[2]."</p>";
					echo "</il>";
					$i++;
				}
				?>
					</ul>
			</div>
		</div>
	</article>
	<footer>
		<div class="foot">Wszelkie prawa zastrzeżone. Restauracja Etna.</div>
	</footer>
	
</body>
</html>