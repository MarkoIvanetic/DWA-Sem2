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
	<meta charset="utf-8">
	<title>Pašteta i Bakar</title>
	<meta name="description" content="">
	<meta name="author" content="Marko Ivanetić">
	<meta name="author" content="Luka Gado">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--SCRIPTS-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/JQscript.js"></script>
	<!--CSS-->
	<link rel="stylesheet" href="css/normalize.css">
	<link href="css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
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
          <li><a href="">SERVICES</a></li>
          <li><a href="oglas.php">PREDAJ OGLAS</a></li>
          <li><a href="#">CONTACT</a></li>
        </ul>
      </nav>
    </header>

    <div class="content col-xs-12">
<form id="mainForm" class="form-horizontal col-md-8 col-md-offset-2 col-xs-12" action="predajoglas.php" enctype="multipart/form-data" method="post">
<fieldset>
<!-- Form Name -->
<legend>Predaja oglasa</legend>
<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="ad-title">Naslov</label>
  <div class="controls">
    <input id="ad-title" name="ad-title" type="text" placeholder="" class="input-xlarge" required="">
    
  </div>
</div>
<!-- Multiple Checkboxes (inline) -->
<div class="control-group">
  <label class="control-label" for="radios">Kategorija</label>
  <div class="controls radio-tags">
    <label class="radio inline unselectable" for="radios-0">
      <input type="radio" name="radios" id="radios-0" value="odjeca" hidden>
      Odjeća
    </label>
    <label class="radio inline unselectable" for="radios-1">
      <input type="radio" name="radios" id="radios-1" value="obuca" hidden>
      Obuća
    </label>
    <label class="radio inline unselectable" for="radios-2">
      <input type="radio" name="radios" id="radios-2" value="3" hidden>
      Roblje
    </label>
    <label class="radio inline unselectable" for="radios-3">
      <input type="radio" name="radios" id="radios-3" value="4" hidden>
      Djeca
    </label>
  </div>
</div>

<!-- Textarea -->
<div class="control-group">
  <label class="control-label" for="ad-desc">Opis</label>
  <div class="controls">                     
    <textarea id="ad-desc" name="ad-desc" cols="50" rows="15"></textarea>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="ad-contact">Kontakt</label>
  <div class="controls">
    <input id="ad-contact" name="ad-contact" type="text" placeholder="0911234567" class="input-xlarge">
    
  </div>
</div>

<!-- File Button --> 
<div class="control-group">
  <label class="control-label" for="ad-image">Slika</label>
  <div class="controls">
    <input id="ad-image" name="ad-image" class="input-file" type="file">
  </div>
</div>
<input type="submit" name="submit" value="Predaj oglas" />
</fieldset>
</form>

    </div>
    <?php
      
      include 'includes/connection.php';

      $title = $_POST['ad-title'];
      $keywords = $_POST['radios'];
      $category = $_POST['category'];
      $description = $_POST['ad-desc'];
      $contact = $_POST['ad-contact'];
      

      $title = mysqli_real_escape_string($db, $title);
      $keywords = mysqli_real_escape_string($db, $keywords);
      $category = mysqli_real_escape_string($db, $category);
      $description = mysqli_real_escape_string($db, $description);
      $contact = mysqli_real_escape_string($db, $contact);
      
      $sql = "INSERT INTO 'oglasi' (id, owner, title, category, description, keywords, contact, date) VALUES
          (NULL, '$owner', '$title', '$category', '$description', '$keywords', '$contact', now() )"
      
      $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
      $image_name = addslashes($_FILES['image']['name']);
      $sql = "INSERT INTO `slike` (`id`, `image`, `image_name`) VALUES (NULL, '$image', '$image_name')";
      if (!mysqli_query($db,$sql)) {
        echo "Nešto ne valja! :("; 
      }
      
      
      ?>
  </body>
  </html>
