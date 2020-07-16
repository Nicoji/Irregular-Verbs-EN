<?php
	session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="css/form.css">
	<title> Vérification connexion </title> 
</head> 
<body>
<?php
	
	// If user is connected, redirected to index
	if(isset($_SESSION['id'])) {
		
		header("Location:index.php");
	
	// If user isn't connected	
	} else {
	
		// Verify that we have the infos from the form 
		if(isset($_POST['username']) && isset($_POST['password'])) {
			
			$username = htmlspecialchars($_POST['username']);
			$password = htmlspecialchars($_POST['password']);
			
			// Connection to database
			require('database-connection.php');
			
			$request = $database->prepare("SELECT * FROM users WHERE username = :username");
			$request->execute(array(
				":username" => $username
			));
			$return = $request->fetch();
			$hash = $return['password'];
			
			// If the username exists in the database
			if($return) {
				
				// And if the password match 			
				if(password_verify($password, $hash)) { 
					
					$_SESSION['id'] = $return['id'];
					$request->closeCursor();	
					header("Location:index.php");
				
				// Wrong password when the user exists	
				} else {
				?>			
					<p class="message"> Mot de passe incorrect </p>
					<div class="col text-center">
						<button class="btn btn-primary align-self-center"><a href="connexion.php" class="centerButton"> Retourner à la page de connexion</a></button>
					</div>			
				<?php		
				}
			// Enter username doesn't exists in the database
			} else { 
			?>			
				<p class="message"> Cet utilisateur n'existe pas </p>
				<div class="col text-center">
					<button class="btn btn-primary align-self-center"><a href="create-account.php" class="centerButton"> Créer un compte</a></button>
				</div>
			<?php	
			}
		// If we don't have the infos, redirected to the connection form 	
		} else {

			header("Location:connection.php");
		}	
	}
?>
</body>
</html>