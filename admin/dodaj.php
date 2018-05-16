<?php include '..\header/header_log.php';?>
<div id="container12">
<div id="tytul">Dodaj danie</div>
<div class="menu1">
			<a href="admin.php">Panel Administratora</a><br/>
			<a href="lista.php">Lista użytkowników</a><br/>
			<a href="zamowienia.php">Lista zamówień</a><br/>
			<a href="dodaj.php">Dodaj danie</a><br/>
			<a href="..\scripts/logout.php">Wyloguj się</a><br/>
			</div>

			<div id="zawartosc">
		<form action="..\scripts/dodaj.php" method="POST">
	
		<input type="text" value=""placeholder="Nazwa" onfocus="this.placeholder=''" onblur="this.placeholder='Nazwa'" name="nazwa" /><br />
		
		
		
		 <input type="text" placeholder="Cena" onfocus="this.placeholder=''" onblur="this.placeholder='Cena'" value="" name="cena" /><br />
	
		
		<select  name="kategoria" id="kategoria">
		<option value="1">Pizza</option>
		<option value="2">Sałatka</option>
		<option value="3">Makaron</option>
		<option value="4">Dodatki</option>
		</select>	

		<br />
		
		<select  name="rozmiar" id ="rozmiar">
		<option value="1">Mała(Pizza i dodatki)</option>
		<option value="2">Średnia(Pizza i dodatki)</option>
		<option value="3">Duża(Pizza i dodatki)</option>
		<option value="4">Standard(Sałatki i Makarony)</option>
		</select>
		
		<br />
		
		<input type="text" placeholder="Opis" onfocus="this.placeholder=''" onblur="this.placeholder='Opis'" value="" name="opis" /><br />
		
		<br />
		
		<input type="submit"  class="Zatwierdz" value="Dodaj danie"  />
		
	</form>
	</div>
	
</body>
</html>