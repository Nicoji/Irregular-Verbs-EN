<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta chartset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="form.css">
    <title>Connexion</title>
</head>
<body>
    <?php
    if(isset($_SESSION['id'])) {

        header('Location:index.php');

    } else {
        ?>
        <div class="container">    
            <div class="offset-md-3 col-md-6 form">
                <form method="post" action="account-control.php">
                    <legend> Connectez-vous </legend>

                    <label for="" class=""> Nom d'utilisateur : </label>
                    <input type="text" id="" name="" class="form-control"> <br>

                    <label for=""> Mot de passe : </label>
                    <input type="password" id="" name="" class="form-control"> <br>

                    <input type="submit" value="Se connecter" class="btn btn-info"><br>
                    <small> Pas encore de compte ? <a href="create-account.php"> Créez-en un ! </a></small>
                </form>
            </div>
        </div>
    <?php    
    }
    ?>
</body>
</html>