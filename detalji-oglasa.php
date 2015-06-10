<?php
  session_start();
  include 'includes/connection.php';
  $id = htmlspecialchars($_GET["id"]);
  $sql = "SELECT * FROM oglasi WHERE id = '$id'";
  $result = mysqli_query($db, $sql);
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
          <li><a href='kontakt.php'>KONTAKT</a></li>
          <li class="active"><a href='predaja-oglasa.php'>PREDAJ OGLAS</a></li>
          <li class=''><a href='index.php'>POČETNA</a></li>
          <li class='site-title hidden-xs'>
            <h3>SITE TITLE</h3>
          </li>
        </ul>
      </div>
    </header>
    <div class="content col-xs-12">
    <div class="tag-selector col-sm-offset-1 col-sm-10">
      <div class="ads-front-container col-sm-offset-1 col-sm-10 col-xs-12">
        <?php
          while($row = mysqli_fetch_array($result))
          {
          $date = new DateTime($row['date']);

          echo '<div class="ad-preview col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8">';
             echo '<h2 class="col-xs-12"><b>' .$row['title']. '</b></h2>';
             echo '<h3 class="col-xs-4"><u>Prijavio:</u> '.$row['owner'].'</h3>';
             echo '<h3 class="col-xs-4"><u>Kategorija:</u> '.$row['keywords'].'</h3>';
             echo '<h3 class="col-xs-4"><u>Datum:</u> '.$date->format('d.m.Y').'</h3>';
             echo '<p class="col-xs-12">'.$row['description'].'</p>';
             echo '<h3 class="col-xs-6"><u>Kontakt:</u> '.$row['contact'].'</h3>';
             echo '<h3 class="col-xs-6"><u>Lokacija:</u> Zagreb</h3>';
          
           echo '<button class="red-button red-button-front col-xs-12"><a style="color:white; text-decoration:none;" href="profile.php">Povratak na profil</a></button>';
          echo '</div>';
          }
          ?>
      </div>
    </div>
  </body>
  <link rel="stylesheet" href="css/style.css">
  <html>