<?php
    session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="css/form.css">
	<title> Configurer le test </title> 
</head> 
<body>
<?php

    if(isset($_SESSION['id'])) {
        ?>
        <div class="container">
            <form method="post" action="test.php" class="offset-md-4 col-md-4 form">
                <legend>Configurer le test</legend>

                <label for="number">Nombre de verbe à réviser :</label>
                <input type="number" name="number" id="number" min="10" max="170" class="form-control" required>
                <br>    
                <p> Quels verbes voulez-vous réviser ? </p>

                <input type="checkbox" name="learned[]" id="pas_appris" value="0"> 
                <label for="pas_appris">Pas appris</label> <br>
                <input type="checkbox" name="learned[]" id="en_cours" value="1"> 
                <label for="en_cours">En cours</label> <br>
                <input type="checkbox" name="learned[]" id="appris" value="2" checked="#"> 
                <label for="appris">Appris</label> <br>
                <br>
                <input type="submit" value="Lancer le test" class="btn btn-info">
                <br>
                <small><a href="verb-list.php">Annuler</a></small>
            </form>
        </div>

    <?php
    } else {
        header("Location:index.php");
    }
    ?>

</body>
</html>