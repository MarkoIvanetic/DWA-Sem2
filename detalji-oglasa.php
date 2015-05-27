<?php
	session_start();
	include 'includes/connection.php';
	
	$id = $_SESSION['oglas_id'];
	$sql = "SELECT * FROM oglasi WHERE id = '$id'";
	$result = mysqli_query($db, $sql);
	while($row = mysqli_fetch_array($result))
	{
		echo $row['id']; //ID oglasa
		echo '</br>' .$row['owner']; //vlasnik oglasa
		echo '</br>' .$row['title']; //Naslov 
		echo '</br>' .$row['description']; //Opis
		echo '</br>' .$row['keywords']; //Ključne rijeci
		echo '</br>' .$row['contact']; //Kontakt
		echo '</br>' .$row['date']; //Datum
		
	}

?>