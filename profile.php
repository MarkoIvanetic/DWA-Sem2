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

while($row = mysqli_fetch_array($result))
    {
      

      $email = $row['email'];
      $kontakt = $row['kontaktbroj'];

    }
    echo "sam da ti bude lakse";
    echo "Trenutni Email: $email  <br/> trenutni kontakt: $kontakt";

?>
	
	<form action="profile.php" method="POST" role="form">

    <legend>
      <?php echo $_SESSION['username'];?>
    </legend>

    <label for="email">Email:</label>
      <input type="email" id="email" name="email" /> <br/>

    <label for="kontakt">Kontakt:</label>
      <input type="text" id="kontakt" name="kontakt" /> <br/>

    <label for="lozinka">Lozinka:</label>
      <input type="password" id="lozinka" name="lozinka" /> <br/><br/>

    <input type="submit" value="Spremi" name="submit"/>



</form>


<?php
if(isset($_POST['submit'])){
  
include 'includes/connection.php';

  $email = mysqli_real_escape_string($db, $_POST['email']);
  $kontakt = mysqli_real_escape_string($db, $_POST['kontakt']);
  $password = mysqli_real_escape_string($db, $_POST['lozinka']);
  $password = md5($password);
  

///// NECE I NECE

  function empty_email($email){
    global $db;
    if(!empty($email)){
     $sql = "UPDATE korisnici SET email = '$email' WHERE username = '$owner' ";
     $result = mysqli_query($db, $sql);
      if(!result){
        echo "Greška";
      }else{
        echo "Uspješno ste promjenili Email adresu!";
        echo "sam da ti bude lakse";
        echo "Trenutni Email: $email  <br/> trenutni kontakt: $owner";
        header("Refresh:2;url=profile.php");
      }

    }else{
      return false;
    }
  }

  if($email == NULL){
    echo "Email prazan!";
  }else{
    $sql = "UPDATE korisnici SET email = '$email', password = '$password', kontaktbroj = '$kontakt' WHERE username = '$owner' ";
      $result = mysqli_query($db, $sql);
      if(!result)
      {
        echo "Greška pri unošenju novog Emaila!";
      }else{
        echo "Uspješno ste promjenili Email adresu!";
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
        echo "Uspješno ste obrisali oglas $id!";
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