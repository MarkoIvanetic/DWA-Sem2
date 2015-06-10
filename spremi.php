<html>
<head>
	<meta charset="UTF-8" />
</head>
<body>


	<?php
	include 'includes/connection.php';
	session_start(); 
	

	$username = $_POST['username'];
	$username = mysqli_real_escape_string($db, $username);
	$password = md5($_POST['password']);
	$password2 = md5($_POST['password2']);
	$kontaktbroj = 0;
	$email = $_POST['email'];
	$vercode = $_POST['vercode'];
	
	
				//Provjera da li su inputi prazni
	function is_empty($password, $username, $email){
		if(empty($password) || empty($username) || empty($email))
		{
			echo 'Sva polja moraju biti popunjena! </br>';
			header("Refresh:2;url=registracija.php;");
			return false;
		}else{
			return true;
		}
	}
	
				// Provjera CAPTCHA
	function is_valid_captcha($vercode){
		if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]==''){ 
			echo  'Unijeli ste krivi kod! Pokušajte ponovno!';
			echo "</br>";
			header("url=registracija.php");
			return false;
		}else{
			return true;
		}
	}

	//duljina passworda
	function pass_length($password){
		if(strlen($password) < 6){
			echo "Lozinka mora imati više od 6 znakova!";
			return false;
		}else{
			return true;
		}
	}
	
				// Funkcija za provjeru emaila
	function is_valid_email($email){
		global $db;
		$string = "SELECT * FROM korisnici WHERE email = '$email'";
		$query = mysqli_query($db, $string);
		if(mysqli_num_rows($query) > 0)
		{
			echo "E-mail već postoji u bazi!";
			echo "</br>";
			header("url=registracija.php");
			return false;
		}else
		{
			return true;
		}
	}

				// Funkcija za provjeru passworda
	function is_valid_password($password, $password2){
		if($password != $password2){
			echo "Lozinke se ne poklapaju!";
			echo "</br>";
			header("url=registracija.php");
		}else{
			return true;
		}
	}
	
				//Kreiranje korisnika
	function create_user($username, $password, $kontaktbroj, $email){
		global $db;
		$sql = "INSERT INTO korisnici (id, username, password, kontaktbroj, email)
		VALUES (NULL, '$username', '$password', '$kontaktbroj', '$email')";
		$result = mysqli_query($db, $sql);
		if($result){
						  return true; // Uspjeh
						}else{
						  return false; // BUUUU
						}
					}
					
				// Početak učitavanja
					if (is_valid_email($email) && pass_length($password) && is_valid_password($password,$password2) && is_valid_captcha($vercode) && is_empty($password, $username, $email))
					{
						if (create_user($username, $password, $kontaktbroj, $email)) {
							echo 'Uspješno ste se registrirali!';
							echo '<audio controls style="visibility:hidden;" autoplay preload="auto">
							<source src="res/regSnoop.mp3" type="audio/mpeg" id="gtaSound">
							</audio>';
							header("refresh:8;url=prijava.php");
						}else{
							echo 'Greška!';
							header("url=registracija.php");
						}
					}
					?>
				</body>

				</html>