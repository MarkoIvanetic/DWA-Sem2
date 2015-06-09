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
          <li class='active'><a href='predaja-oglasa.php'>PREDAJ OGLAS</a></li>
          <li><a href='index.php'>POČETNA</a></li>
          <li class='site-title hidden-xs'>
            <h3>SITE TITLE</h3>
          </li>
        </ul>
      </div>
    </header>
    <div class="content col-xs-12">
      <form id="mainForm" action="predaja-oglasa.php" class="form-horizontal col-md-4 col-md-offset-2 col-xs-12" enctype="multipart/form-data" method="post">
        <fieldset>
          <!-- Form Name -->
          <legend>
            <h1>Predaja oglasa</h1>
          </legend>
          <!-- Text input-->
          <div class="control-group">
            <label class="control-label" for="ad-title">Naslov<span class="mandatory">*</span></label>
            <div class="controls">
              <input id="ad-title" name="ad-title" maxlength="64" type="text" placeholder="" class="input-xlarge col-xs-12" required="">
            </div>
          </div>
          <div class="control-group tag-container">
            <label class="control-label" for="radios">Kategorija<span class="mandatory">*</span></label>
            <div class="controls radio-tags">
              <label class="radio inline unselectable" for="radios-0">
              <input type="radio" name="radios" id="radios-0" value="pribor" hidden required>
              Kućanski pribor
              </label>
              <label class="radio inline unselectable" for="radios-1">
              <input type="radio" name="radios" id="radios-1" value="namjestaj" hidden required>
              Namještaj
              </label>
              <label class="radio inline unselectable" for="radios-2">
              <input type="radio" name="radios" id="radios-2" value="obuca" hidden required>
              Obuća
              </label>
              <label class="radio inline unselectable" for="radios-3">
              <input type="radio" name="radios" id="radios-3" value="odjeca" hidden required>
              Odjeća
              </label>
              <label class="radio inline unselectable" for="radios-4">
              <input type="radio" name="radios" id="radios-4" value="bebe" hidden required>
              Oprema za bebe/ Igračke
              </label>
              <label class="radio inline unselectable" for="radios-5">
              <input type="radio" name="radios" id="radios-5" value="tehnika" hidden required>
              Tehnika
              </label>
              <label class="radio inline unselectable" for="radios-6">
              <input type="radio" name="radios" id="radios-6" value="usluge" hidden required>
              Usluge
              </label>
              <label class="radio inline unselectable" for="radios-7">
              <input type="radio" name="radios" id="radios-7" value="ostalo" hidden required>
              Ostalo
              </label>
            </div>
          </div>
          <div class="control-group" id="desc-container">
            <label class="control-label" for="ad-desc">Opis<span class="mandatory">*</span></label>
            <div class="controls">                     
              <textarea id="ad-desc" name="ad-desc" cols="50" rows="5"></textarea>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="ad-contact">Kontakt</label>
            <div class="controls">
              <input id="ad-contact" name="ad-contact" type="text" placeholder="0911234567" class="input-xlarge">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="selectbasic">Lokacija</label>
            <div class="controls">
              <select id="selectbasic" name="selectbasic" class="input-xlarge">
                <option></option>
                <optgroup label="Središnja Hrvatska">
                  <option>Zagrebačka županija</option>
                  <option>Grad Zagreb</option>
                  <option>Krapinsko-zagorska županija</option>
                  <option>Sisačko-moslavačka županija</option>
                  <option>Karlovačka županija</option>
                  <option>Varaždinska županija</option>
                  <option>Koprivničko-križevačka županija</option>
                  <option>Bjelovarsko-bilogorska županija</option>
                  <option>Međimurska županija</option>
                </optgroup>
                <optgroup label="Hrvatsko primorje i Gorska Hrvatska">
                  <option>Primorsko-goranska županija</option>
                  <option>Ličko-senjska županija</option>
                  <option>Istarska županija</option>
                </optgroup>
                <optgroup label="Slavonija">
                  <option>Virovitičko-podravska županija</option>
                  <option>Požeško-slavonska županija</option>
                  <option>Brodsko-posavska županija</option>
                  <option>Osječko-baranjska županija</option>
                  <option>Vukovarsko-srijemska županija</option>
                </optgroup>
                <optgroup label="Dalmacija">
                  <option>Zadarska županija</option>
                  <option>Šibensko-kninska županija</option>
                  <option>Splitsko-dalmatinska županija</option>
                  <option>Dubrovačko-neretvanska županija</option>
                </optgroup>
              </select>
            </div>
          </div>
          <div class="control-group">
            <div class="controls">
              <input type="submit" class="red-button col-xs-4" name="submit" value="Predaj oglas" />
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
         $description = $_POST['ad-desc'];
		 $location = $_POST['selectbasic'];
         $contact = $_POST['ad-contact'];
         $owner = $_SESSION['username'];
         $owner_id = $_SESSION['id'];
        
         $title = mysqli_real_escape_string($db, $title);
         $keywords = mysqli_real_escape_string($db, $keywords);
         $category = mysqli_real_escape_string($db, $category);
         $description = mysqli_real_escape_string($db, $description);
         $contact = mysqli_real_escape_string($db, $contact);
        
		function is_empty($title, $keywords, $description){
			if(empty($title) || empty($keywords) || empty($description))
			{
				echo "Sva polja označena zvjezdicom moraju biti popunjena!";
				return false;
			}else{
				return true;
			}
		}
		
		function ad_submit($title, $keywords, $description, $location, $contact, $owner)
		{
			global $db;
			$query = "INSERT INTO `oglasnik`.`oglasi` ( `id` ,`owner` ,`title` ,`location` ,`description` ,`keywords` ,`contact` ,`date`) 
						VALUES (NULL, '$owner', '$title', '$location', '$description', '$keywords', '$contact', now() )";
				$result = mysqli_query($db, $query);
			  if($result)
			    {
				echo "Uspješno ste predali!";
				 return true; // Uspjeh
				}else{
					return false;
				}
		}
		
		
		//Tunesto zajebava
        if(is_empty($title, $keywords, $description) && ad_submit($title, $keywords, $description, $location, $contact, $owner))
		{
				echo "TOOO";
			}else{
				echo " NE";
			}

		}
         
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