<?php 
    session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/connexion.css">
	<title> Sauvegarder le Test </title> 
</head> 
<body>
<?php

    if(isset($_POST['number']) && isset($_POST['learn']) && isset($_POST['result']) ) {
        
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
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

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

        echo $_SESSION['id'];

    } else {


    }