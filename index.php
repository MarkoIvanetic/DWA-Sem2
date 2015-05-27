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
        echo "<ul><li><a href='profile.php'>My profile</a></li><li><a href='moji-oglasi.php'>My oglasi</a></li><li id='logout'><a href='logout.php'>Logout</a></li></ul></li>";
      }
      if(!isset($_SESSION['username'])) 
        { echo '<li><a href="prijava.php">LOGIN</a></li>';} 
      ?>

      <li><a href='#' id="click">CONTACT</a></li>
      <li><a href='predaja-oglasa.php'>PREDAJ OGLAS</a></li>
      <li><a href='#'>ABOUT</a></li>
      <li class='active'><a href='index.php'>HOME</a></li>
    </ul>
  </div>
</header>
<div class="banner darken wrap">
 <img src="res\bannerCLFlippednReady.png" class="">
 <div class="desc">
  <h2 class="col-xs-12">Možeš nekome uljepšati život</h2>
  <h4 class="col-xs-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec consectetur egestas risus ut tempor. Praesent eu fringilla nisl. Nullam blandit id nisi ac dapibus. Pellentesque laoreet, nisi vel mollis posuere, mi est fermentum mauris, quis tempus libero sem ullamcorper nisi. </h4>
  <button class="red-button col-xs-6 col-xs-offset-3">Daj nam pare</button>
</div>
</div>

<div class="content col-xs-12">

  <div class="ads-front-container col-sm-offset-1 col-sm-10">

    <div class="ads-front col-sm-6 col-md-4">
      <h2 class="col-xs-12">Dajem kornjaču i akvarij</h2>
      <h3 class="col-xs-12">Zagreb</h3>
      <p class="col-xs-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec consectetur egestas risus ut tempor. Praesent eu fringilla nisl. Nullam blandit id nisi ac dapibus. Pellentesque laoreet, nisi vel mollis posuere, mi est fermentum mauris, quis tempus libero sem ullamcorper nisi.</p>
      <button class="red-button-front red-button col-xs-6">Više</button>
    </div>

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

      echo '<div class="ads-front col-sm-6 col-md-4">';
      echo '<h2 class="col-xs-12">' .$row['title']. '</h2>';
      echo '<h3 class="col-xs-12">Predao: '.$row['owner'].'</h3>';
      echo '<p class="col-xs-12">'.$row['description'].'</p>';

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
<link rel="stylesheet" href="css/style.css">
<html>
