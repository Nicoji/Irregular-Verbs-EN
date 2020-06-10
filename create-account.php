<!DOCTYPE html>
<html>
<head>
    <meta chartset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/form.css">
    <title>Créer un compte</title>
</head>
<body>
    <div class="container">    
        <div class="offset-md-3 col-md-6 form">
            <form method="post" action="account-control.php">
                <legend> Créer un compte </legend>
                
                <label for="username"> Nom d'utilisateur : </label>
                <input type="text" id="username" name="username" class="form-control"> <br>

                <label for="password"> Mot de passe : </label>
                <input type="password" id="password" name="password" class="form-control"> <br>

                <label for="psw-confirmation"> Confirmer votre mot de passe : </label>
                <input type="password" id="psw-confirmation" name="psw-confirmation" class="form-control"> <br>

                <input type="submit" value="Créer un compte" class="btn btn-info"><br>
                <small> Vous avez déja un compte ? <a href="connection.php"> Connectez-vous ! </a></small>
            </form>
        </div>
    </div>
</body>
</html>
