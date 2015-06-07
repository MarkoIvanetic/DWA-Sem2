<?php
session_start();
include 'includes/connection.php';
?>
<!doctype html>
<html lang=''>
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
          <!-- <li class='has-sub'><a href="#" id="user-profile"> -->
          <?php 
          if(isset($_SESSION['username']))
           {echo " <li class='has-sub'><a href='#'' id='user-profile'>" . $_SESSION['username'] . "</a>";
         echo "<ul><li><a href='profile.php'>Moj profil</a></li><li id='logout'><a href='logout.php'>Logout</a></li></ul></li>";
       }
       if(!isset($_SESSION['username'])) 
        { echo '<li><a href="prijava.php">LOGIN</a></li>';} 
      ?>
      <li class="active"><a href='kontakt.php'>KONTAKT</a></li>
      <li><a href='predaja-oglasa.php'>PREDAJ OGLAS</a></li>
      <li class=''><a href='index.php'>POČETNA</a></li>
      <li class='site-title hidden-xs'>
        <h3>SITE TITLE</h3>
      </li>
    </ul>
  </div>
</header>
<div class="contact-container col-xs-12">
  <div class="col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8">
    <div class="col-sm-6" style="height:500px;background:red;">
      <div class="contact-image col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8" style="background:purple;height:150px">
        <img src="res/zbea.png" class="img-circle">
      </div>
      <div class="col-xs-8 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8" style="background:yellow;height:200px"></div>


    </div>
    <div class="col-sm-6" style="height:500px;background:blue;">
      <div class="contact-image col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8" style="background:purple;height:150px">
        <img src="res/zbea.png" class="img-circle">
      </div>
      <div class="col-xs-8 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8" style="background:yellow;height:200px"></div>
    </div>
  </div>
</div>
</body>
<footer>
 <div class="signature col-xs-12" style="text-align:center;">
  <p>Marko Ivanetić & Luka Gado</p>
  <h4>© Copyright 2015 - Site tittle </h4>
</div>
</footer>
<link rel="stylesheet" href="css/style.css">
</html>