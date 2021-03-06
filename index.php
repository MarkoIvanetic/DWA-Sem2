<?php
  session_start();
    error_reporting(0);
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
    <script type="text/javascript">
    window.onload = function() {
    if(!window.location.hash) {
        window.location = window.location + '#home';
        window.location.reload();
    }
}
    </script>
  </head>
  <body class="indexBody">
    <div class="coverUp"></div>
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
          <li><a href='predaja-oglasa.php'>PREDAJ OGLAS</a></li>
          <li class='active'><a href='index.php'>POČETNA</a></li>
          <li class='site-title hidden-xs'>
            <h3>SITE TITLE</h3>
          </li>
        </ul>
      </div>
    </header>
    <div class="banner darken wrap hidden-xs">
      <img src="res\bannerCLFlippednReady.png" class="">
      <div class="desc">
        <h2 class="col-sm-12">Možeš nekome uljepšati život</h2>
        <h4 class="col-xs-12">Imaš li stari par cipela koje ti više ne trebaju? Ili veš mašinu koju si zamijenio novijom? Možeš pomoći drugima doniranjem stvari koje ti više ne trebaju putem oglasa!</h4>
         <button class="red-button col-xs-6 col-xs-offset-3">Predaj oglas</button>
      </div>
    </div>
    <div class="content col-xs-12">
      <div class="tag-selector col-sm-offset-1 col-sm-10">
        <div class="control-group tag-container">
          <label class="control-label" for="radios">Kategorija<span class="mandatory">*</span></label>
          <div class="controls radio-tags">
            <label class="radio inline unselectable" for="radios-0">
            <input type="radio" name="radios" id="radios-0" value="pribor" hidden>
            Kućanski pribor
            </label>
            <label class="radio inline unselectable" for="radios-1">
            <input type="radio" name="radios" id="radios-1" value="namjestaj" hidden>
            Namještaj
            </label>
            <label class="radio inline unselectable" for="radios-2">
            <input type="radio" name="radios" id="radios-2" value="obuca" hidden>
            Obuća
            </label>
            <label class="radio inline unselectable" for="radios-3">
            <input type="radio" name="radios" id="radios-3" value="odjeca" hidden>
            Odjeća
            </label>
            <label class="radio inline unselectable" for="radios-4">
            <input type="radio" name="radios" id="radios-4" value="bebe" hidden>
            Oprema za bebe/ Igračke
            </label>
            <label class="radio inline unselectable" for="radios-5">
            <input type="radio" name="radios" id="radios-5" value="tehnika" hidden>
            Tehnika
            </label>
            <label class="radio inline unselectable" for="radios-6">
            <input type="radio" name="radios" id="radios-6" value="usluge" hidden>
            Usluge
            </label>
            <label class="radio inline unselectable" for="radios-7">
            <input type="radio" name="radios" id="radios-7" value="ostalo" hidden>
            Ostalo
            </label>
          </div>
        </div>
      </div>
      <div class="ads-front-container onlyIndex col-sm-offset-1 col-sm-10 col-xs-8">
        <?php
          $sql = "SELECT * FROM oglasi ORDER BY `id` DESC";
          $result = mysqli_query($db, $sql);
          while($row = mysqli_fetch_array($result))
          {
          // echo $row['id']; //ID oglasa
          // echo '</br>' .$row['owner']; //vlasnik oglasa
          // echo '</br>' .$row['title']; //Naslov 
          // echo '</br>' .$row['description']; //Opis
          // echo '</br>' .$row['keywords']; //Ključne rijeci
          // echo '</br>' .$row['contact']; //Kontakt
          // echo '</br>' .$row['date']; //Datum
            $date = new DateTime($row['date']);
            echo '<div class="ads-front col-sm-6 col-md-4">';
            echo '<h2 class="col-xs-12">' .$row['title']. '</h2>';
            echo '<h3 class="col-xs-12"><a>'.$row['owner'].'</a> - Grad Zagreb, <span>'.$date->format('d.m.Y').'</span></h3>';
            echo '<p class="col-xs-12 indexP">'.$row['description'].'</p>';
            echo '<input type="text" value="'.$row['keywords'].'" hidden>';
            
          //Stvaranje URL-a
            $id = $row['id'];
            $_SESSION['oglas_id'] = $id;
            $url = 'detalji-oglasa.php?id=' . $id;
            echo '<button class="red-button red-button-front col-xs-6"><a href="' . $url . '">Više</a></button>';
            echo '</div>';
          }
          
          ?> 
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
  <script type="text/javascript">
  if(window.location.hash) {
  $(".coverUp").hide();
}
  </script>
  </html>