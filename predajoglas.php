<html>
<head>
	<meta charset="UTF-8" />
</head>
<body>

			<?php
			
			include 'includes/connection.php';

			$title = $_POST['title'];
			$keywords = $_POST['keywords'];
			$category = $_POST['category'];
			$description = $_POST['description'];
			$contact = $_POST['contact'];
			$owner = $_POST['title'];

			$title = mysqli_real_escape_string($db, $title);
			$keywords = mysqli_real_escape_string($db, $keywords);
			$category = mysqli_real_escape_string($db, $category);
			$description = mysqli_real_escape_string($db, $description);
			$contact = mysqli_real_escape_string($db, $contact);
			
			
			$sql = "INSERT INTO `oglasnik`.`oglasi` (`id`, `owner`, `title`, `category`, `description`, `keywords`, `contact`, `date`) VALUES
					(NULL, '$owner', '$title', '$category', '$description', '$keywords', '$contact', CURRENT_TIMESTAMP )"
			
			$result = mysqli_query($db, $sql);
			if(!mysqli_query($db, $sql)){
				echo "NE RADI PREDAJA";
			}else{
				echo " EADI";
			}
			
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name = addslashes($_FILES['image']['name']);
			$sql = "INSERT INTO `slike` (`id`, `image`, `image_name`) VALUES (NULL, '$image', '$image_name')";
			if (!mysqli_query($db,$sql)) {
				echo "Nešto ne valja! :("; 
			}
			
			
			?>
</body>

</html>