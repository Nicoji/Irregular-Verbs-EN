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

        $translation = [];
        $infinitive = [];
        $userInfinitive = [];
        $simplePast = [];
        $userSimplePast = [];
        $pastParticiple = [];
        $userPastParticiple = [];

        require('database-connection.php');
        ?>
        <div class="container">
            <div class="table-responsive">
                <table id="table" class="table table-condensed">
                    <tr class="th">
                        <th> Verbe: </th>
                        <th> Infinitif: </th>
                        <th> Prétérit: </th>
                        <th> Particie passé: </th>
                    </tr>
        <?php
        for($i = 0; $i < $number; $i++) {
            $translation[$i] = $_POST['translation'.$i];
            $infinitive[$i] = $_POST['infinitive'.$i];
            $userInfinitive[$i] = $_POST['answer-infinitive'.$i];
            $simplePast[$i] = $_POST['simple-past'.$i];
            $userSimplePast[$i] = $_POST['answer-simple-past'.$i];
            $pastParticiple[$i] = $_POST['past-participle'.$i];
            $userPastParticiple[$i] = $_POST['answer-past-participle'.$i];

            $request = $database->query("SELECT * FROM verbs WHERE translation IN (\"$translation[$i]\")");
            
            while($return = $request->fetch()) {
                    if($return['infinitive'] == $infinitive[$i]) {
                        $infinitiveAnswer = "table-success";
                    } else {
                        $infinitiveAnswer = "table-danger";
                    }

                    if($return['simple_past'] == $simplePast[$i]) {
                        $simplePastAnswer = "table-success";
                    } else {
                        $simplePastAnswer = "table-danger";
                    }

                    if($return['past_participle'] == $pastParticiple[$i]) {
                        $pastparticipleAnswer = "table-success";
                    } else {
                        $pastparticipleAnswer = "table-danger";
                    }

                    ?>
                    <tr class="">
                        <th><?php echo $return['translation']; ?></th>
                        <th><?php echo $return['infinitive']; ?></th>
                        <th><?php echo $return['simple_past']; ?></th>
                        <th><?php echo $return['past_participle']; ?></th>
                    </tr>
                    <tr class="">
                        <th>Vos réponses :</th>
                        <th class="<?php echo $infinitiveAnswer; ?>"><?php echo $infinitive[$i]; ?></th>
                        <th class="<?php echo $simplePastAnswer; ?>"><?php echo $simplePast[$i]; ?></th>
                        <th class="<?php echo $pastparticipleAnswer; ?>"><?php echo $pastParticiple[$i]; ?></th>
                    </tr>  
            <?php            
            }
        }
        ?>
                </table>
            </div>
        </div>
        <?php

        // print_r($translation); echo "<br>";
        // print_r($infinitive); echo "<br>";
        // print_r($userInfinitive); echo "<br>";
        // print_r($simplePast); echo "<br>";
        // print_r($userSimplePast); echo "<br>";
        // print_r($pastParticiple); echo "<br>";
        // print_r($userPastParticiple); echo "<br>";


        

    } else {
        header("Location:configuration-test.php");
    }