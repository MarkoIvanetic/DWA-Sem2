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
         <li class='has-sub'><a href="#" id="user-profile">
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
     <li class='active'><a href='index.php'>HOME</a></li>
   </ul>
 </div>
</header>
    <div class="content col-xs-12">
      <form id="mainForm" action="predaja-oglasa.php" class="form-horizontal col-md-8 col-md-offset-2 col-xs-12" enctype="multipart/form-data" method="post">
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
          <div class="control-group">
            <label class="control-label" for="ad-desc">Opis</label>
            <div class="controls">                     
              <textarea id="ad-desc" name="ad-desc" cols="50" rows="15"></textarea>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="ad-contact">Kontakt</label>
            <div class="controls">
              <input id="ad-contact" name="ad-contact" type="text" placeholder="0911234567" class="input-xlarge">
            </div>
          </div>
          <div class="control-group">
            <label for="file">Select a file:</label> <input type="file" name="image" id="image"> <br />
            <div class="controls">
              <input type="submit" name="submit" value="Predaj oglas" />
            </div>
          </div>
        </fieldset>
      </form>
      <?php
        if(isset($_POST['submit']))
        {
        	include 'includes/connection.php';
        	session_start();
        
        	$title = $_POST['ad-title'];
        	$keywords = $_POST['radios'];
        	$category = "nema kategorije";
        	$description = $_POST['ad-desc'];
        	$contact = $_POST['ad-contact'];
        	$owner = $_SESSION['username'];
        	$owner_id = $_SESSION['id'];
        
        	$title = mysqli_real_escape_string($db, $title);
        	$keywords = mysqli_real_escape_string($db, $keywords);
        	$category = mysqli_real_escape_string($db, $category);
        	$description = mysqli_real_escape_string($db, $description);
        	$contact = mysqli_real_escape_string($db, $contact);
        
        	function save_image($name, $image, $owner_id)
        	{
        		global $db;
        		$query = "INSERT INTO slike (id, ad_id, image, image_name) VALUES (NULL, '$owner_id', '$image', '$name')";
        		$result = mysqli_query($db, $query);
        		if($result)
        		{
        			echo "<br />Slika je uspješno uploadana. <br />";
        			return true;
        		}else{
        			echo "<br /> Slika nije uploadana.  <br />";
        			return false;
        		}
        	}
        
        				// ZA SPREMANJE SLIKE U FOLDER
        					$uploadDir = 'images/'; //Image Upload Folder
        					$fileName = $_FILES['image']['name'];
        					$tmpName  = $_FILES['image']['tmp_name'];
        					$fileSize = $_FILES['image']['size'];
        					$fileType = $_FILES['image']['type'];
        					
        				// ZA UPLOAD SLIKE
        					$image = addslashes($_FILES['image']['tmp_name']);
        					$name = addslashes($_FILES['image']['name']);
        					$image = file_get_contents($image);
        					$image = base64_encode($image);
        
        					$query = "INSERT INTO `oglasnik`.`oglasi` (`id` ,`owner` ,`title`, `category`, `description`, `keywords`, `contact`, `date`) VALUES (NULL, '$owner', '$title', '$category', '$description', '$keywords', '$contact', now() )";
        					$result = mysqli_query($db, $query);
        					if($result && ($image == NULL))
        					{
        						echo "Uspješno ste predali oglas bez slike!";
        						  return true; // Uspjeh
        						}
        						if($result && save_image($name, $image, $owner_id)){
        							echo "Uspješno ste predali oglas!";
        						  return true; // Uspjeh
        						}else{
        						  return false; // BUUUU
        						}
        
        
        					}
        
        
        					?>
    </div>
  </body>
</html>