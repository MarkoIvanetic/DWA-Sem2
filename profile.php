<?php
session_start();
include 'includes/connection.php';
  if(!isset($_SESSION['username'])){ //if login in session is not set
  	header("Location: prijava.php");
  }
  ?>
  <!DOCTYPE HTML>
  <html lang="en">
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
<body>
	<header id="header">
		<div id='cssmenu' class='align-right'>
			<ul>
				<li class='has-sub active'><a href="#" id="user-profile">
					<?php 
					if(isset($_SESSION['username']))
						{echo  $_SESSION['username'];}
					if(!isset($_SESSION['username'])) 
						{ echo '<li><a href="prijava.php">LOGIN</a></li>';} 
					?>
				</a>
				<ul>
					<li><a href='#'>My profile</a></li>
					<li><a href='#'>My oglasi</a></li>
					<li><a href='#'>Logout</a></li>
				</ul>
			</li>
			<li><a href='#'>CONTACT</a></li>
			<li><a href='predaja-oglasa.php'>PREDAJ OGLAS</a></li>
			<li><a href='#'>ABOUT</a></li>
			<li class=''><a href='index.php'>HOME</a></li>
		</ul>
	</div>
</header>

<?php
$owner = $_SESSION['username'];
$sql = "SELECT * FROM korisnici WHERE username = '$owner'";
$result = mysqli_query($db, $sql);
$GLOBALS['$fromEmail'] = "";
$GLOBALS['$formContact'] = "";
$GLOBALS['$formLocation'] = "";

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
<div class="container-fluid">
	<div class="col-sm-offset-2 col-sm-8 col-lg-offset-3 col-lg-6 active-checkbox">
		<?php
		while($row = mysqli_fetch_array($result))
		{
			echo $row['username'];
			echo '</br>';
			echo $row['email'];
			echo '</br>';
			if ($row['kontaktbroj']!=0){
			echo $row['kontaktbroj'];}
			echo '</br>';
		}
		?>
	<form class="form-horizontal profile-form" role="form">
<fieldset>
<!-- Form Name -->
<legend>
	<?php echo $_SESSION['username'];?>
</legend>
<!-- Text input-->
<div class="control-group">
  <label class="control-label col-xs-3" for="email-field">Email:</label>
  <div class="controls col-xs-8 col-xs-offset-1">
    <input id="email-field" name="email-field" type="text" placeholder="izmjeni" class="input-large edit-input">
    <p class="edit-text">Ovdje ide iz baze</p>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label col-xs-3" for="contact-field">Kontakt broj:</label>
  <div class="controls col-xs-8 col-xs-offset-1">
    <input id="contact-field" name="contact-field" type="text" placeholder="izmjeni" class="input-large edit-input">
  	<p class="edit-text">Ovdje ide iz baze</p>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label col-xs-3" for="location-field">Lokacija:</label>
  <div class="controls col-xs-8 col-xs-offset-1">
    <input id="location-field" name="location-field" type="text" placeholder="izmjeni" class="input-large edit-input">
 	<p class="edit-text">Ovdje ide iz baze</p>
  </div>
</div>

</fieldset>
</form>
	</div>
</div>
</body>
</html>