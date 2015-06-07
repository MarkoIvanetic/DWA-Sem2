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
$sql = "SELECT * FROM korisnici WHERE username = '$owner'";
$result = mysqli_query($db, $sql);
$GLOBALS['$formEmail'] = "";
$GLOBALS['$formContact'] = "";
$GLOBALS['$formLocation'] = "";

while($row = mysqli_fetch_array($result))
		{
			$GLOBALS['$formEmail'] = $row['username'];

			$GLOBALS['$formEmail'] = $row['email'];

			if ($row['kontaktbroj']!=''){
			$GLOBALS['$formLocation'] = $row['kontaktbroj'];} else  {$GLOBALS['$formLocation'] = "N/A";}
		}

if(isset($_POST['kontakt']))
{
	$novi_kontakt = $_POST['kontakt'];
	$sql = "UPDATE korisnici SET kontaktbroj = '$novi_kontakt' WHERE username = '$owner'";
	$result = mysqli_query($db, $sql);
	if(!result)
	{
		echo "Greška pri unošenju novog broja!";
	}else{
		echo "Uspješno ste promjenili kontakt broj!";
		header("Refresh:1;url=profile.php");
	}
}
?>
<div class="container-fluid">
	<div class="col-sm-offset-2 col-sm-8 col-lg-offset-3 col-lg-6 active-checkbox">
	<form class="form-horizontal profile-form" role="form">
<fieldset>

<legend>
	<?php echo $_SESSION['username'];?>
</legend>


  <label class="control-label col-sm-3 col-xs-2" for="email-field">Email:</label>
  <div class="controls col-xs-8 col-xs-offset-1">
     <?php echo '<input id="email-field" name="email-field" type="text" value="'.$GLOBALS['$formEmail'].'" class="hidden input-large edit-input">' ?>
    <?php echo '<p class="edit-text">'.$GLOBALS['$formEmail'].'</p>' ?>
  </div>


  <label class="control-label col-sm-3 col-xs-2" for="contact-field">Kontakt:</label>
  <div class="controls col-xs-8 col-xs-offset-1">
   <?php echo '<input id="contact-field" name="contact-field" type="text" value="'.$GLOBALS['$formContact'].'" class="hidden input-large edit-input">' ?>
  	<?php echo '<p class="edit-text">'.$GLOBALS['$formContact'].'</p>' ?>
  </div>



  <label class="control-label col-sm-3 col-xs-2" for="location-field">Lokacija:</label>
  <div class="controls col-xs-8 col-xs-offset-1">
      <?php echo '<input id="location-field" name="location-field" type="text" value="'.$GLOBALS['$formContact'].'" class="hidden input-large edit-input">' ?>
 	<?php echo '<p class="edit-text">'.$GLOBALS['$formContact'].'</p>' ?>
  </div>

<!-- PASSWORD CHANGE -->
<div class="hidden passchange">
  <label class="control-label col-sm-3 col-xs-2" for="location-field">Stara Lozinka:</label>
  <div class="controls col-xs-8 col-xs-offset-1">
      <input id="location-field" name="location-field" type="text" class="input-large edit-input">
  </div>

    <label class="control-label col-sm-3 col-xs-2" for="location-field">Nova Lozinka:</label>
  <div class="controls col-xs-8 col-xs-offset-1">
      <input id="location-field" name="location-field" type="text" class="input-large edit-input">
  </div>
</div>
  <!-- BUTTONS -->
  <div id="izmjeni" class="controls col-xs-3 col-sm-offset-4 col-xs-offset-2">
    <button name="izmjeni" class="red-button">Izmjeni podatke</button>
  </div> 

<!-- OVO TREBA SUBMITAT NOVE PODATKE -->
  <div id="save" class="controls col-xs-1 col-sm-offset-4 col-xs-offset-1 hidden">
    <button name="save" class="red-button">Spremi</button>
  </div>

   <div id="quit" class="controls col-xs-1 col-xs-offset-1 hidden">
    <button name="quit" class="red-button">Odustani</button>
  </div>
</fieldset>
</form>
	</div>
</div>
<div class="container-ads col-xs-12" style="margin-top:50px;">
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
            echo '<form action="moji-oglasi.php" method="POST"><input type="submit" class="butRes red-button col-sm-4 col-xs-10" value="Obriši" name='.$id.'></form>';
            echo '</div>';
    
    if(isset($_POST[$id])){
     echo $id;
     // Treba nam console.log da korisnik potvrduje obrisati oglas
     $query = "DELETE FROM oglasi WHERE id = '$id'";
     $result = mysqli_query($db, $query);    
   }
   
    }
  echo '</div>';
 
?>
</div>
</body>

</html>