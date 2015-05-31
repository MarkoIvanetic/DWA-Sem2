<?php
session_start();
include 'includes/connection.php';
  if(isset($_SESSION['username'])){ //if login in session is not set
  	header("Location: index.php");
  }
  ?>
  <html>
  <head>
  	<head>
  		<meta charset='utf-8'>
  		<meta http-equiv="X-UA-Compatible" content="IE=edge">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<meta name="viewport" content="width=device-width" />
  		<title>Pašteta i Bakar</title>
  		<meta name="description" content="">
  		<meta name="author" content="Marko Ivanetić">
  		<meta name="author" content="Luka Gado">
  		<!--SCRIPTS-->
  		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  		<script src="js/bootstrap.min.js"></script>
  		<script src="js/script.js"></script>
  		<script src="js/JQscript.js"></script>
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
</head>

<body class="col-xs-12 regBody">
	<div class="login-logo col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8">SITE NAME</div>
	<div class="login-FormContainer col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8">
		<div class="col-xs-3 visible-xs"></div>
		<div class="col-md-6 col-xs-6 login-inputs">
			<form class="form-horizontal" action="spremi.php" method="post">
				<!-- Text input-->
				<div class="control-group">
					<label class="control-label" for="username" >Korisničko ime</label>
					<div class="controls">
						<input id="username" name="username" type="text" oninvalid="this.setCustomValidity('Korisničko ime ne smije biti prazno')" placeholder="" class="input-large" required>

					</div>
				</div>

				<!-- Password input-->
				<div class="control-group">
					<label class="control-label" for="password">Lozinka</label>
					<div class="controls">
						<input id="password" name="password" oninvalid="this.setCustomValidity('Lozinka ne smije biti prazna')" required type="password" placeholder="" class="input-large">

					</div>
				</div>


				<!-- Password input-->
				<div class="control-group">
					<label class="control-label" for="password2">Ponovite lozinku</label>
					<div class="controls">
						<input id="password2" name="password2" type="password" placeholder="" oninvalid="this.setCustomValidity('Ponovljena lozinka ne smije biti prazna')"  class="input-large" required>

					</div>
				</div>

				<!-- Text input-->
				<div class="control-group">
					<label class="control-label" for="email">E-mail adresa</label>
					<div class="controls">
						<input id="email" name="email" type="text" placeholder="" class="input-large" required="">

					</div>
				</div>

				<!-- Text input-->
				<div class="control-group">
					<label class="control-label" for="textinput"></label>
					<div class="controls">
						<img src="includes/captcha.php" id="captcha" class="col-xs-4">
					</div>
				</div>
				<br>
				<div class="col-xs-12 whiteRow20"></div>

				<div class="control-group">
					<label class="control-label" for="textinput"></label>
					<div class="controls">
						<input  type="text" placeholder="Unesite brojeve sa slike" name="vercode"/>
					</div>
				</div>
				<div class="col-xs-12 whiteRow20"></div>
				<div class="control-group">
					<label class="control-label" for="submit"></label>
					<div class="controls">
						<input type="submit" id="submit" name="submit" class="red-button col-xs-6" value="Registracija"></input>
					</div>
				</div>
			</form>
			<div class="col-xs-12 whiteRow20"></div>
		</div>
		<div class="col-md-6 login-regRedirect">
			<div class="col-xs-12">
				<h3>Već imate korisnički račun?</h3>
				<button class="blue-button" style="width:50%; min-width:240px;" onclick="location.href = 'prijava.php';">Prijava</button>
			</div>
		</div>
	</div>
</body>