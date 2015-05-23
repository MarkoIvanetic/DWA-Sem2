<html>
<head>
	<meta charset="UTF-8" />
	
</head>
<body>

			<form action="spremi.php" method="post">
						
				<label for="username">Korisničko ime: </label>			
					<input type="text" require id="username" name="username" required="required" oninvalid="this.setCustomValidity('Korisničko ime ne smije biti prazno')" required placeholder="Vaše korisničko ime">
						</br> </br>
						
				<label for="password">Lozinka: </label>			
					<input type="password" require id="password" name="password" required="required" oninvalid="this.setCustomValidity('Lozinka ne smije biti prazna')" required placeholder="Vaša lozinka">
						</br> </br>
				
				<label for="password2">Ponovljena lozinka: </label>			
					<input type="password" require id="password2" name="password2" required="required" oninvalid="this.setCustomValidity('Ponovljena lozinka ne smije biti prazna')" required placeholder="Vaša ponovljena lozinka">
						</br> </br>
						
				<label for="email">E-mail adresa: </label>
					<input type="email" name="email" required placeholder="Vaša lE-mail adresa">
						</br> </br>
						
						<!-- CAPTCHA -->	
								<img src="includes/captcha.php"> &nbsp <input type="text" name="vercode" />
									<br/> <br/>
									
				<input type="submit" name="submit" value="Registracija" />
			</form>
			
			
			
			
			
			
</body>

</html>