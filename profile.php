<?php
	session_start();
?>
<html>
<head>
	<meta charset="UTF-8" />
</head>

<body>



	<?php
		include 'includes/connection.php';
		$owner = $_SESSION['username'];
		$sql = "SELECT * FROM korisnici WHERE username = '$owner'";
		$result = mysqli_query($db, $sql);
		while($row = mysqli_fetch_array($result))
		{
			echo $row['username'];
				echo '</br>';
			echo $row['email'];
				echo '</br>';
			echo $row['kontaktbroj'];
				echo '</br>';
			
		}
		
		// Ažuriranje kontakt broja
			echo '<form action="profile.php" method="POST">';
			echo '<label for="kontakt">Unesite broj za kontakt: </label></br>';
			echo '<input type="text" name="kontakt" id="kontakt"/></br>';
			echo '<input type="submit" value="Ažuriraj" name="nkontakt"></form>';
		
		if(isset($_POST['nkontakt']))
		{
			$novi_kontakt = $_POST['kontakt'];
			$sql = "UPDATE korisnici SET kontaktbroj = '$novi_kontakt' WHERE username = '$owner'";
			$result = mysqli_query($db, $sql);
			if(!result)
			{
				echo "Greška pri unošenju novog broja!";
			}else{
				echo "Uspješno ste promjenili kontakt broj!";
				header("Refresh:2;url=profile.php");
			}
		}
		
		// Ažuriranje Emaila
			echo '<form action="profile.php" method="POST">';
			echo '<label for="email">Unesite novu Email adresu: </label></br>';
			echo '<input type="text" name="email" id="email"/></br>';
			echo '<input type="submit" value="Ažuriraj" name="nemail"></form>';
			
		if(isset($_POST['nemail']))
		{
			$novi_email = $_POST['email'];
			$sql = "UPDATE korisnici SET email = '$novi_email' WHERE username = '$owner'";
			$result = mysqli_query($db, $sql);
			if(!result)
			{
				echo "Greška pri unošenju novog Emaila!";
			}else{
				echo "Uspješno ste promjenili Email adresu!";
				header("Refresh:2;url=profile.php");
			}
		}
		
		//Promjena lozinke, postoji i na prijava.php
		echo '<br/><a href="reset-lozinke.php">Želite promjeniti lozinku?</a>';
		
		?>

</body>
</html>