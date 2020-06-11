<?php
	session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="css/form.css">
	<title> Vérification création de compte </title> 
</head> 
<body>
<?php
	
	// If user is connected, redirected to index
	if(isset($_SESSION['id'])) {
		
		header("Location:index.php");
	
	// If user isn't connected	
	} else {
	
		// Verify that we have the infos from the form 
		if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['psw-confirmation'])) {
			
			$username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            $pswConfirmation = htmlspecialchars($_POST['psw-confirmation']);
            
            if($password == $pswConfirmation) {

                // Connection to database
                require('database-connection.php');
                
                $request = $database->prepare("SELECT * FROM users WHERE username = :username");
                $request->execute(array(
                    ":username" => $username
                ));
                $return = $request->fetch();
                
                // If the username doesn't exist yet in the database
                if(!$return) {
                    $request->closeCursor();

                    $hash = password_hash($password, PASSWORD_BCRYPT);

                    // add user in database
                    $addProfile = $database->prepare("INSERT INTO users(username, password) VALUES(:username, :password)");
                    $addProfile->execute(array(
                        ":username" => $username,
                        ":password" => $hash
                    ));
                    $addProfile->closeCursor();

                    // get the new user's ID
                    $getNewUserId = $database->prepare("SELECT id FROM users WHERE username = :username");
                    $getNewUserId->execute(array(
                        ":username" => $username
                    ));
                    $returnId = $getNewUserId->fetch();
                    $id = $returnId['id'];
                    $getNewUserId->closeCursor();

                    // fil verbs_learned table
                    for($i = 1; $i <= 170; $i++) {
                        $updateVerbLearned = $database->prepare("
                        INSERT INTO verbs_learned(id_verb, id_user, status)
                        VALUES(:idVerb, :idUser, :status)
                        ");
                        $updateVerbLearned->execute(array(
                            ":idVerb" => $i,
                            ":idUser" => $id,
                            ":status" => 0
                        ));
                    }

                    ?>			
                    <p class="message"> Votre compte a été créé ! </p>
                    <div class="col text-center">
                        <button class="btn btn-info align-self-center return-button"><a href="connection.php" class="return-link"> Se connecter </a></button>
                    </div>			
                <?php
                    
                // Username already exists in the database
                } else {
                ?>			
                    <p class="message"> Ce nom d'utilisateur est indisponible </p>
                    <div class="col text-center">
                        <button class="btn btn-info align-self-center return-button"><a href="create-account.php" class="return-link"> Changer le nom d'utilisateur </a></button>
                    </div>			
                <?php
                }

            // Entered passwords are different
            } else {
            ?>			
                <p class="message"> Les mots de passe ne correspondent pas </p>
                <div class="col text-center">
                    <button class="btn btn-info align-self-center return-button"><a href="create-account.php" class="return-link"> Réessayer </a></button>
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