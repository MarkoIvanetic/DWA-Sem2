<html class="login-html">
<head>
	<meta charset="utf-8">
	<title>Prijava</title>
	<meta name="description" content="">
	<meta name="author" content="Marko Ivanetić">
	<meta name="author" content="Luka Gado">
	<meta name="viewport" content="width=device-width" />
	<!--SCRIPTS-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
	<!--CSS-->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/normalize.css">
	<link href="css/bootstrap.css" rel="stylesheet">
	<!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href="css/navigation.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,700,600' rel='stylesheet' type='text/css'>
</head>
<body class="col-xs-12">
	<div class="login-logo col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8">SITE NAME</div>
	<div class="login-FormContainer col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8">
		<div class="col-md-6 login-inputs">
			<form class="form-horizontal" action="prijava.php" method="post">
				<!-- Form Name -->

				<!-- Text input-->
				<div class="control-group">
					<label class="control-label" for="username">Korisničko ime:</label>
					<div class="controls">
						<input id="username" name="username" type="text" oninvalid="this.setCustomValidity('Korisničko ime ne smije biti prazno')" class="" required>

					</div>
				</div>

				<!-- Password input-->
				<div class="control-group">
					<label class="control-label" for="password">Lozinka</label>
					<div class="controls">
						<input type="password" id="password" name="password" required="required" oninvalid="this.setCustomValidity('Loz0inka ne smije biti prazna')" class="" required="">

					</div>
				</div>
						<a href="reset-lozinke.php">Zaboravili ste lozinku?</a>

				<!-- Button -->
				<div class="control-group">
					<label class="control-label" for="submit"></label>
					<div class="controls">
						<input type="submit" id="submit" name="submit" class="red-button col-md-6 col-sm-3" value="Prijava"></input>
						<button class="blue-button col-xs-3 col-sm-offset-1 visible-sm visible-xs" onclick="location.href = 'registracija.php';">Registracija</button>
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-6 login-regRedirect">
			<div class="col-xs-12">
				<h3>Niste registrirani?</h3>
				<p>Započnite s registracijom, brzo je i jednostavno!</p>
				<button class="blue-button" style="width:50%; min-width:240px;" onclick="location.href = 'registracija.php';">Registracija</button>
			</div>
		</div>
	</div>


	<?php

	if(isset( $_POST['submit']))
	{

		include 'includes/connection.php';
		session_start();
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$username = mysqli_real_escape_string($db, $username);

		$sql = "SELECT * FROM korisnici WHERE username='$username'";
		$result = mysqli_query($db, $sql);
		if(mysqli_num_rows($result) > 0)
		{
			$row = mysqli_fetch_array($result);

			if($password == $row['password']){
				echo "Uspješno ste se prijavili!";
				$_SESSION["id"] = $row['id'];
				$_SESSION["username"] = $row['username'];
				echo $_SESSION['id'];
				echo $_SESSION['username'];
				header("Location:index.php");
			}else{
				echo "<h3 class='col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8'>Krivo ste upisali korisničko ime ili lozinku!<h3>";
				header("url=prijava.php");
			}

		}else{
			echo"<h4 class='col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8'>Korisničko ime ili lozinka nije ispravna</h4>";
		}
	}	
	else{
	}

	?>



</body>

</html>