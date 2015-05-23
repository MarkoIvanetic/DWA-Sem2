<?php
session_start();
session_destroy(); 
header("Location:index.php")
// Check if the session is set and return the appropriate message
?> 
