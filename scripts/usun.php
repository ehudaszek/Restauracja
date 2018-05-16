<?session_start();

	require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{

		if(isset($_GET['del']))
		{
    
    $id = $_SESSION['id'];
    
    $query = "DELETE FROM uzytkownicy WHERE idUzytkownik i=$id";
    $db->query($query);
    
    $db->close();
    header('location: ../lista.php');
		}
	}
	?>