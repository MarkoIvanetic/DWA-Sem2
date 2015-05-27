 <html>
 <head>
	<meta charset="UTF-8" />
 </head>
 <body>
<?php

	session_start();
	if($_SESSION['username'] == NULL)
		header("Location:index.php");

	$owner = $_SESSION['username'];
	
	echo '<li><a href=index.php>Nazad</li></a>';
	
	include 'includes/connection.php';
	
	$query = "SELECT * FROM oglasi WHERE owner = '$owner'";
	$result = mysqli_query($db, $query);
	
	echo '<table style="border: 1px solid black; text-align: left; width: 100%;">';
	 while($row = mysqli_fetch_array($result))
	  {
	  $id = $row['id'];
	  $link = '<form action="moji-oglasi.php" method="POST"><tr><td><input type="submit" value="Obriši" name='.$id.'></td></form>';
	  echo '<tr> <th>ID oglasa</th> <th>Oglas</th> <th>Kategorija</th> <th>Opis</th> <th>Datum</th> </tr>';
	  echo '<tr> <td>' .$row['id'].'</td> <td>' .$row['title'].'</td> <td>' .$row['category'].'</td> <td>' .$row['description'].'</td> <td>' .$row['date'].'</td>';
	  echo $link;
	  
	  if(isset($_POST[$id])){
		 echo $id;
		 // Treba nam console.log da korisnik potvrduje obrisati oglas
		 $query = "DELETE FROM oglasi WHERE id = '$id'";
		 $result = mysqli_query($db, $query);		 
	 }
	 
	  echo "<br />";
	  }
	echo '</table>';
	
	 
 
?>

</body>
</html>