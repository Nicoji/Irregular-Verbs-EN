<?php 
    session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="css/form.css">
	<title> Sauvegarder le Test </title> 
</head> 
<body>
<?php

    if(isset($_SESSION['id'])) {

        if(isset($_POST['number']) && isset($_POST['learn']) && isset($_POST['result'])) {
            
            $number = $_POST['number'];
            $returnLearn = $_POST['learn'];
            $result = $_POST['result'];

            switch($returnLearn) {
                case "0" :
                    $learn = 0;
                    break;
                case "1" :
                    $learn = 1;
                    break;
                case "2" :
                    $learn = 2;
                    break;
                case "0,1" :
                    $learn = 10;
                    break;
                case "0,2" :
                    $learn = 20;
                    break;
                case "1,2" :
                    $learn = 12;
                    break;
                case "'0','1','2'" :
                    $learn = 120;
                    break;
                default : 
                    $learn = 120;		
            }

            // Database connection 
            require('database-connection.php');

            // Use the actual time in the good format
            $date = date("Y-m-d H:i:s");

            $saveTest = $database->prepare("
            INSERT INTO test(date, number, learn, result, id_user) 
            VALUES(:date, :number, :learn, :result, :idUser)
            ");
            $saveTest->execute(array(
                ":date" => $date,
                ":number" => $number,
                ":learn" => $learn,
                ":result" => $result,
                ":idUser" => $_SESSION['id']
            ));
            ?>			
            <p class="message"> Votre test a bien été enregistré ! </p>
            <div class="col text-center">
                <button class="btn btn-info align-self-center return-button"><a href="test-records.php" class="return-link"> Voir mes test </a></button>
                <button class="btn btn-info align-self-center return-button"><a href="index.php" class="return-link"> Accueil </a></button>
            </div>			
            <?php

        } else {
            ?>
            <p class="message"> Désolé, une erreur est survenue, votre test n'a pas pu être enregistré. </p>
            <div class="col text-center">
                <button class="btn btn-info align-self-center return-button"><a href="index.php" class="return-link"> Accueil </a></button>
            </div>
        <?php    
        }

    } else {
        header("Location:index.php");
    }