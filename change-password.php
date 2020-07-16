<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta chartset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/form.css">
    <title> Modifier le mot de passe </title>
</head>
<body>
    <?php
    if(isset($_SESSION['id'])) {
        ?>
        <div class="container">    
            <div class="offset-md-3 col-md-6 form">
                <form method="post" action="change-psw-control.php">
                    <legend> Changez votre mot de passe </legend>

                    <label for="actual-psw"> Mot de passe actuel : </label>
                    <input type="password" id="actual-psw" name="actual-psw" class="form-control"> <br>

                    <label for="new-psw"> Nouveau mot de passe : </label>
                    <input type="password" id="new-psw" name="new-psw" class="form-control"> <br>

                    <label for="confirm-psw"> Confirmer le mot de passe : </label>
                    <input type="password" id="confirm-psw" name="confirm-psw" class="form-control"> <br>

                    <input type="submit" value="Changer le mot de passe" class="btn btn-info"><br>
                    <small><a href="verb-list.php"> Annuler </a></small>
                </form>
            </div>
        </div>

    <?php    
    } else {
         header('Location:index.php');
    }
    ?>

</body>
</html>