<?php
session_start();
  error_reporting(0);
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
  <body class="profileBody">
    <header id="header">
      <div id='cssmenu' class='align-right'>
        <ul>
          <!-- <li class='has-sub'><a href="#" id="user-profile"> -->
          <?php 
          if(isset($_SESSION['username']))
           {echo " <li class='active has-sub'><a href='#'' id='user-profile'>" . $_SESSION['username'] . "</a>";
         echo "<ul><li><a href='profile.php'>Moj profil</a></li><li id='logout'><a href='logout.php'>Logout</a></li></ul></li>";
       }
       if(!isset($_SESSION['username'])) 
        { echo '<li><a href="prijava.php">LOGIN</a></li>';} 
      ?>
      <li><a href='kontakt.php'>KONTAKT</a></li>
      <li class=''><a href='predaja-oglasa.php'>PREDAJ OGLAS</a></li>
      <li><a href='index.php'>POČETNA</a></li>
      <li class='site-title hidden-xs'>
        <h3>SITE TITLE</h3>
      </li>
    </ul>
  </div>
</header>


<?php
$owner = $_SESSION['username'];
$sql = "SELECT * FROM `korisnici` WHERE username = '$owner'";
$result = mysqli_query($db, $sql);

while($row = mysqli_fetch_array($result))
{
  $email = $row['email'];
  $kontakt = $row['kontaktbroj'];
}

?>
<div class="container-fluid">
  <div class="col-sm-offset-2 col-sm-8 col-lg-offset-3 col-lg-6 infoChanger">
   <form class="container-fluid" action="profile.php" method="POST" role="form">
    <fieldset>
      <legend>
        <?php echo $_SESSION['username'];?>
      </legend>

      <label class="control-label col-sm-3 col-xs-2" for="email">Email:</label>
      <div class="controls col-xs-8 col-xs-offset-1">
        <?php echo '<input type="email" id="email" name="email" value="'.$email.'" class="hidden input-large edit-input">' ?>
        <?php echo '<p class="underline edit-text">'.$email.'</p>' ?>
      </div>

      <label class="control-label col-sm-3 col-xs-2" for="kontakt">Kontakt:</label>
      <div class="controls col-xs-8 col-xs-offset-1">
        <?php echo '<input id="kontakt" name="kontakt" type="text" value="'.$kontakt.'" class="hidden input-large edit-input">' ?>
        <?php echo '<p class="underline edit-text">'.$kontakt.'</p>' ?>
      </div>

      <div class="hidden passchange">
        <label class="control-label col-sm-3 col-xs-2" for="lozinka">Nova Lozinka:</label>
        <div class="controls col-xs-8 col-xs-offset-1">
          <input type="password" id="lozinka" name="lozinka" class="input-large edit-input"/> 
        </div>
      </div>

    <div id="izmjeni" class="controls col-xs-3 col-sm-offset-4 col-xs-offset-2">
    <button name="izmjeni" class="red-button">Izmjeni podatke</button>
    </div> 

      <div id="save" class="controls col-xs-1 col-sm-offset-2 col-xs-offset-3 hidden">
        <input type="submit" class="red-button" value="Spremi" name="submit"/>
      </div>

      <div id="quit" class="controls col-xs-1 col-xs-offset-1 hidden">
        <button name="quit" class="red-button">Odustani</button>
      </div>
    </fieldset>
  </form>
</div>
</div>


<?php
if(isset($_POST['submit'])){

  include 'includes/connection.php';

  $email = mysqli_real_escape_string($db, $_POST['email']);
  $kontakt = mysqli_real_escape_string($db, $_POST['kontakt']);
  $password = mysqli_real_escape_string($db, $_POST['lozinka']);
  

///// NECE I NECE

  function empty_email($email){
    global $db;
    if(!empty($email)){
     $sql = "UPDATE korisnici SET email = '$email' WHERE username = '$owner' ";
     $result = mysqli_query($db, $sql);
     if(!result){
      echo "Greška";
    }else{
      echo "<h1 class='col-xs-6 col-xs-offset-3'>Uspješno ste promjenili Email adresu!</h1>";
      header("Refresh:2;url=profile.php");
    }

  }else{
    return false;
  }
}

		if($email == NULL){
		  echo "";
		}else{
		  $sql = "UPDATE korisnici SET email = '$email' WHERE username = '$owner' ";
		  $result = mysqli_query($db, $sql);
		  if(!result)
		  {
		    echo "<h1 class='col-xs-6 col-xs-offset-3'>Greška pri unošenju novog Emaila!</h1>";
		  }else{
		    echo "Uspješno ste promjenili Email adresu!<br/>";
		    header("Refresh:2;url=profile.php");
		  }
		}

		if($kontakt == NULL){
			echo "";
		}else{
		  $sql = "UPDATE korisnici SET kontaktbroj = '$kontakt' WHERE username = '$owner' ";
		  $result = mysqli_query($db, $sql);
		  if(!result)
		  {
		    echo "<h1 class='col-xs-6 col-xs-offset-3'>Greška pri unošenju novog kontakta!</h1>";
		  }else{
		    echo "<h1 class='col-xs-6 col-xs-offset-3'>Uspješno ste promjenili kontakt!</h1>";
		    header("Refresh:2;url=profile.php");
		  }
		}

		if($password == NULL){
			echo "";
		}else{
			$password = md5($password);
			$sql = "UPDATE korisnici SET password = '$password' WHERE username = '$owner' ";
			$reuslt = mysqli_query($db, $sql);
			if(!result){
				echo "<h1 class='col-xs-6 col-xs-offset-3'>Greška pri unošenju nove lozinke!</h1>";
			}else{
				echo "<h1 class='col-xs-6 col-xs-offset-3'>Uspješno ste promjenili lozinku!</h1>";
				header("Refresh:2;url=profile.php");
			}
		}

}

?>

<h1 class="col-sm-6 col-md-offset-2 col-md-10" style="margin-top:30px; margin-bottom:0px; font-size:2.8em;">Moji oglasi</h1>
<hr class="col-sm-8 col-sm-offset-2" class="col-xs-12">

<div class="container-ads col-xs-12" style="margin-top:20px; margin-bottom:200px;">
  <?php
  $owner = $_SESSION['username'];
  $query = "SELECT * FROM oglasi WHERE owner = '$owner'";
  $result = mysqli_query($db, $query);
  echo '<div class="ads-front-container col-sm-6 col-md-offset-2 col-md-10">';
  while($row = mysqli_fetch_array($result))
  {
    $id = $row['id'];
    
    $date = new DateTime($row['date']);
    echo '<div class="ads-front col-sm-6 col-md-4">';
    echo '<h2 class="col-xs-12">' .$row['title']. '</h2>';
    echo '<h3 class="col-xs-12"><a>'.$row['owner'].'</a> - Zagreb, <span>'.$date->format('d.m.Y').'</span></h3>';
    echo '<p class="col-xs-12">'.$row['description'].'</p>';
    echo '<input type="text" value="obuca" hidden>';

          //Stvaranje URL-a
    $id = $row['id'];
    $_SESSION['oglas_id'] = $id;
    $url = 'detalji-oglasa.php?id=' . $id;
    echo '<button class="butRes blue-button col-sm-4 col-xs-10"><a href="' . $url . '">Više</a></button>';
    echo '<form action="profile.php" method="POST"><input type="submit" class="butRes red-button col-sm-4 col-xs-10" value="Obriši" name='.$id.'></form>';
    echo '</div>';
    
    if(isset($_POST[$id])){
     // Treba nam console.log da korisnik potvrduje obrisati oglas
     $query = "DELETE FROM oglasi WHERE id = '$id'";
     $result = mysqli_query($db, $query); 
     if($result){
      echo "<h1 class='col-xs-6 col-xs-offset-3'>Uspješno ste obrisali oglas $id!</h1>";
    }   
  }

}
echo '</div>';

?>
</div>
</body>
<footer>
 <div class="signature col-xs-12" style="text-align:center;">
  <p>Marko Ivanetić & Luka Gado</p>
  <h4>© Copyright 2015 - Site tittle </h4>
</div>
</footer>
</html>