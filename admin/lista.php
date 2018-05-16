<?php include '..\header/header_log.php';?>
<div id="container1">
	<?php
	session_start();
		require_once "..\scripts/connect.php";

		$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
		if ($polaczenie->connect_errno!=0)
		{
			echo "Error: ".$polaczenie->connect_errno;
		}
		 $rezultat = @$polaczenie->query("SELECT uzytkownicy.idUzytkownik, uzytkownicy.login, uzytkownicy.email, dane.Imie, dane.Nazwisko, dane.Miasto, dane.Numer_Lokalu, rola.Nazwa FROM uzytkownicy
		inner join dane on uzytkownicy.idDane=dane.idDane
		inner join rola on uzytkownicy.idRola=rola.idRola
		ORDER BY uzytkownicy.idUzytkownik;");
		

if(isset($_GET['del']))
		{
    $id = $_GET['del'];
    $v = @$polaczenie->query ( "DELETE FROM uzytkownicy WHERE idUzytkownik=$id");
	header('Location: lista.php');
		}

echo <<<END
	
<div id="tytul">Lista użytkowników</div>
		<div class="menu1">
			<a href="admin.php">Panel Administratora</a><br/>
			<a href="lista.php">Lista użytkowników</a><br/>
			<a href="zamowienia.php">Lista zamówień</a><br/>
			<a href="dodaj.php">Dodaj danie</a><br/>
			<a href="..\scripts/logout.php">Wyloguj się</a><br/>
			</div>

			<div id="zawartosc">
END;
			echo "<p>";
		echo "<table ><tr>";
		echo "<td ><strong>Id</strong></td>";
		echo "<td ><strong>Login</strong></td>";
		echo "<td ><strong>Email</strong></td>";
		echo "<td ><strong>Imie</strong></td>";
		echo "<td ><strong>Nazwisko</strong></td>";
		echo "<td ><strong>Miescowość</strong></td>";
		echo "<td ><strong>Numer domu</strong></td>";
		echo "<td ><strong>Rola</strong></td>";
		echo "</tr>";
		while($row=mysqli_fetch_array($rezultat))
                        { 
							?>
                            <tr>
							
                                <td><?php   echo $row[0];?></td>
                                <td><?php   echo $row[1];?></td>
                                <td><?php   echo $row[2];?></td>
                                <td><?php   echo $row[3];?></td>
                                <td><?php   echo $row[4];?></td>
                                <td><?php   echo $row[5];?></td>
                                <td><?php   echo $row[6];?></td>
                                <td><?php   echo $row[7];?></td>
                                <td>
								 <a class="del_btn" href="lista.php?del=<?php echo $row[0]; ?>">Usuń</a>
                                </td>
                            </tr>
                        <?php
                        }   
		 echo "</table>";
		?>
			</div>
	
</body>
</html>


