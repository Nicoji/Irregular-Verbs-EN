<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="css/form.css">
	<title> Changement du mot de passe </title> 
</head> 
<body>
<?php
    if(isset($_SESSION['id'])) {

        if(isset($_POST['actual-psw']) && isset($_POST['new-psw']) && isset($_POST['confirm-psw'])) {
            
            $actualPsw = htmlspecialchars($_POST['actual-psw']);
            $newPsw = htmlspecialchars($_POST['new-psw']);
            $confirmPsw = htmlspecialchars($_POST['confirm-psw']);
            
            // Connection to database
            require('database-connection.php');

            $request = $database->prepare("SELECT * FROM users WHERE id = :id");
            $request->execute(array(
                ':id' => $_SESSION['id']
            ));
            $return = $request->fetch();
            $hash = $return['password'];

            if(password_verify($actualPsw, $hash)) {

                if($newPsw == $confirmPsw) {

                    $request->closeCursor();

                    $newPsw = password_hash($newPsw, PASSWORD_BCRYPT);

                    $modifyPsw = $database->prepare("UPDATE users SET password = :password WHERE id = :id");
                    $modifyPsw->execute(array(
                        ':password' => $newPsw,
                        ':id' => $_SESSION['id']
                    ));
                    ?>
                    <p class="message"> Le mot de passe a bien été changé ! </p>
                    <div class="col text-center">
                        <button class="btn btn-primary align-self-center"><a href="change-password.php" class="centerButton"> Retour à l'accueil </a></button>
                    </div>
                <?php
                // Passwords don't match
                } else {
                ?>			
                    <p class="message"> Les mots de passe ne correspondent pas </p>
                    <div class="col text-center">
                        <button class="btn btn-primary align-self-center"><a href="change-password.php" class="centerButton"> Réessayer </a></button>
                    </div>			
                <?php  
                }              
                    
            // Wrong password (actual one)
            } else {
            ?>			
                <p class="message"> Mot de passe actuel incorrect </p>
                <div class="col text-center">
                    <button class="btn btn-primary align-self-center"><a href="change-password.php" class="centerButton"> Réessayer </a></button>
                </div>			
            <?php
            }

        } else {
            header("Location:change-password.php");
        }

    } else {
        header("Location:index.php");
    }
    ?>

</body>
</html>