<?php

	session_start();
	require_once "..\scripts/connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	
	if (isset($_SESSION['zalogowany']))
	{
		$num=mysqli_fetch_row($rezultat = @$polaczenie->query("SELECT idRola FROM uzytkownicy WHERE idUzytkownik='".$_SESSION['idUzytkownik']."';"));
		if($num[0]==2)
		{
			header('Location: ..\admin/admin.php');
		}
		else
		header('Location: panel.php');
	}
	
	
?>

<?php include '..\header\header_log.php';?>
	<div id="container2">
	<?php
	if(isset($_SESSION['blad']))
		{
			echo '<div class="message">';
			echo '<img class="icon" src="/media/images/information.png" alt="" />';
			echo '<p>Podano zły login lub hasło.</p>';
			echo '</div>';
			$_SESSION['blad']=NULL;
			
			
		}?>
		<form action="..\scripts/login.php" method="POST">
			
			<input type="text" placeholder="login" onfocus="this.placeholder=''" onblur="this.placeholder='login'" name="login">
			
			<input type="password" placeholder="hasło" onfocus="this.placeholder=''" onblur="this.placeholder='hasło'" name="haslo"/>
			<a class="konto " href="..\scripts/rejestracja.php">Załóż  nowe konto</a>
			
			<input type="submit" class="Zatwierdz" value="Zaloguj się">
		
			
		</form>
	</div>
</body>
</html>