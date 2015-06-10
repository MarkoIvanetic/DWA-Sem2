<html>
<head>
</head>

<body>



<?php

	echo '<form action="test.php" method="POST">';
			echo '<label for="email">Unesite novu Email adresu: </label></br>';
			echo '<input type="text" name="email" id="email"/></br>';
			echo '<input type="submit" value="Ažuriraj" name="nemail"></form>';
			
		if(isset($_POST['nemail']))
		{
			include 'includes/connection.php';
			$novi_email = $_POST['email'];
			$sql = "UPDATE korisnici SET email = '$novi_email' WHERE id = 39";
			$result = mysqli_query($db, $sql);
			if(!result)
			{
				echo "Greška pri unošenju novog Emaila!";
			}else{
				echo "Uspješno ste promjenili Email adresu!";
				header("Refresh:2;url=test.php");
			}
		}
?>

</body>
</html>