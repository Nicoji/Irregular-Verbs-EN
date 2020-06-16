<?php
    session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="css/test.css">
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
                    <tr class="">
                        <td><?php echo $return['translation']; ?></td>
                        <td><?php echo $return['infinitive']; ?></td>
                        <td><?php echo $return['simple_past']; ?></td>
                        <td><?php echo $return['past_participle']; ?></td>
                    </tr>
                    <tr class="block-answer">
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
                <div class="col text-center">
                    <input type="submit" value="Enregistrer le test" class="btn btn-info">
                </div>
            </form>
        </div>
        <?php


    } else {
        header("Location:configuration-test.php");
    }