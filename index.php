<?php
  session_start();
  include 'includes/connection.php';
  if(!isset($_SESSION['username'])){ //if login in session is not set
    header("Location: prijava.php");
}
  ?>
<html lang="en">
<head>
	<meta charset="utf-8">

	<title>Pašteta i Bakar</title>
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

  <body>
    <header id="header">

      <h1>Site Title</h1>
      <nav id="nav">
        <ul>
          <li id="click"><a>HOME</a></li>
          <li><a href="#">ABOUT</a></li>
          <li><a href="prijava.php">LOGIN</a></li>
          <li><a href="predaja-oglasa.php">PREDAJ OGLAS</a></li>
		  <li><a href="#"><?php echo "Dobrodošao/la" . "  " . $_SESSION['username']; ?></a></li>
          <li><a href="#">CONTACT</a></li>
          
        </ul>
      </nav>
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
    </div>
  </div>
</body>
</html>