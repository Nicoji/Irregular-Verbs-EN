<?php
    session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="">
	<title> Résultat du test </title> 
</head> 
<body>
<?php
    if(isset($_POST['number'])) {

        $number = intval($_POST['number']);
        $infinitive = [];
        
        $userInfinitive = [];

        for($i = 0; $i < $number; i++) {
            $infinitive[$i] = $_POST['infinitive'.$i];
            $userInfinitive[$i] = $_POST['answer-infinitive'.$i];

        }

    } else {
        header("Location:configuration-test.php");
    }