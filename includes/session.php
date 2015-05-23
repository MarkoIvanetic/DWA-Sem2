<?php
	session_start();
	
	$_SESSION["id"] = $row['id'];
	$_SESSION["username"] = $row['username'];
	
?>