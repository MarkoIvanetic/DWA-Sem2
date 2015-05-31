<?php
	session_start();
?>
<html>
<head>
	<meta charset="UTF-8" />
</head>

<body>

	<?php
	if(!isset($_SESSION['username']))
	{
		echo '<form action="" method="POST">';
		echo '<label for="email"> Email: </label>';
			echo '<input type="email" name="email" id="email" />';
		echo '<input type="submit" name="submit" value="Nova lozinka" />';
		echo '</form>';
	}else{
		echo "Trenutno ste prijavljeni!";
		header("Refresh:1;url=index.php");
	}
	?>

	<?php
		if(isset($_POST['submit']))
		{
			include 'includes/connection.php';
			$email = $_POST['email'];

			$sql = "SELECT * FROM korisnici WHERE email = '".$email."'";
			$result = mysqli_query($db, $sql);
			$count = mysqli_num_rows($result);

			//Provjera E-mail u bazi
			if($count != 0)
			{
				//Stvaranje nove lozinke
				$random = rand(72681, 92729);
				$new_password = $random;
				echo $new_password;
				//Kopija lozinke jer u bazu ulazi MD5 hash
				$email_password = $new_password;

				//MD5 random lozinke ide u bazu
				$new_password = md5(new_password);

				//Ažuriranje baze
				$sql = "UPDATE korisnici SET password = '$new_password' WHERE email = '".$email."'";
				$result = mysqli_query($db, $sql);
				if(!mysqli_query($db, $sql)){
					echo "greška!";
				}

				//Slanje lozinke korisniku
				$subject = "Nova lozinka";
				$message = "Vaša lozinka je promijenjena: $email_password";
				$from = "From: pastetaibakar@gmail.com"; 
				mail($email, $subject, $message, $from);
				echo "Vaša nova lozinka je poslana na Vašu Email adresu!";
				header("Refresh:2;url=prijava.php");
			}else{
				echo "Unijeli ste nepostojeći Email! Molimo Vas pokušajte ponovno.";
			}
		}
	?>

</body>
</html>