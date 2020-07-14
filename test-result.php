<?php
    session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/list.css">
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">  
	<title> Résultat du test </title> 
</head> 
<body>
<?php

    if(isset($_POST['number']) && isset($_POST['learn'])) {

        $number = intval($_POST['number']);
        $learn = $_POST['learn'];

        $translation = [];
        $infinitive = [];
        $userInfinitive = [];
        $simplePast = [];
        $userSimplePast = [];
        $pastParticiple = [];
        $userPastParticiple = [];

        // Database connection
        require('database-connection.php');
        // Include navbar in the page
        include('nav.php');
        ?>

        <div class="container">
            <h1>Résultat du test</h1>
            <div class="table-responsive">
                <table id="table" class="table table-condensed">
                    <tr class="center">
                        <th> Verbe: </th>
                        <th> Infinitif: </th>
                        <th> Prétérit: </th>
                        <th> Particie passé: </th>
                    </tr>
        <?php
        $countGoodAnswer = 0;
        $countWrongAnswer = 0;

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
                        $countGoodAnswer += 1;
                    } else {
                        $infinitiveAnswer = "table-danger";
                        $countWrongAnswer += 1;
                    }

                    if($return['simple_past'] == $simplePast[$i]) {
                        $simplePastAnswer = "table-success";
                        $countGoodAnswer += 1;
                    } else {
                        $simplePastAnswer = "table-danger";
                        $countWrongAnswer += 1;
                    }

                    if($return['past_participle'] == $pastParticiple[$i]) {
                        $pastparticipleAnswer = "table-success";
                        $countGoodAnswer += 1;
                    } else {
                        $pastparticipleAnswer = "table-danger";
                        $countWrongAnswer += 1;
                    }

                    ?>
                    <tr class="center">
                        <td class="right-answer"><?php echo $return['translation']; ?></td>
                        <td class="right-answer"><?php echo $return['infinitive']; ?></td>
                        <td class="right-answer"><?php echo $return['simple_past']; ?></td>
                        <td class="right-answer"><?php echo $return['past_participle']; ?></td>
                    </tr>
                    <tr class="center">
                        <td class="answer">Vos réponses :</td>
                        <td class="<?php echo $infinitiveAnswer; ?>"><?php echo $infinitive[$i]; ?></td>
                        <td class="<?php echo $simplePastAnswer; ?>"><?php echo $simplePast[$i]; ?></td>
                        <td class="<?php echo $pastparticipleAnswer; ?>"><?php echo $pastParticiple[$i]; ?></td>
                    </tr>  
            <?php            
            }
        }
        ?>
                </table>
            </div>

            <?php
            $result = round((($countGoodAnswer / ($number * 3)) * 100), 1);
            ?> 
            <p class="result"> Votre résultat : <?php echo $result."%"; ?> </p>   

            <form method="post" action="save-test.php">
                <input type="hidden" name="number" value="<?php echo $number; ?>">
                <input type="hidden" name="learn" value="<?php echo $learn; ?>">
                <input type="hidden" name="result" value="<?php echo $result; ?>">
                <div class="col text-center save-button">
                    <input type="submit" value="Enregistrer le test" class="btn">
                </div>
            </form>
        </div>
        <?php

    } else {
        header("Location:configuration-test.php");
    }
    ?>

<!-- Scripts & Stylesheet to allow dropdown on profile image -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
</html>