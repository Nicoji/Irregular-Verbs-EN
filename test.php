<?php
    session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="">
	<title> Test d'anglais </title> 
</head> 
<body>
<?php
	
	if(isset($_SESSION['id'])) {

        if(isset($_POST['number'])) {

            $number = intval($_POST['number']);

            if(!empty($_POST['learned'])) {
                $learn = implode(',', $_POST['learned']);
            } else {
                $learn = "'0','1','2'";
            }

            require('database-connection.php');
            $sessionId = $_SESSION['id'];
            $request = $database->query("
            SELECT id_verb FROM verbs_learned 
            WHERE id_user =  $sessionId
            AND status IN ($learn) 
            ORDER BY RAND()
            LIMIT $number");

            $i = 1; 
            $verbsId = [];

            while($return = $request->fetch()) {
                $verbsId[$i] = $return['id_verb'];
                $i++;
            }
            $request->closeCursor();
            
            if(sizeof($verbsId) < 10) {
                ?>
                <p class="message"> Les paramètres rentrés ne permettent pas d'avoir au moins 10 questions </p>
                <div class="col text-center">
                    <button class="btn btn-primary align-self-center"><a href="configuration-test.php" class="centerButton"> Changer les paramètres du test </a></button>
                </div>	
            <?php    
            } else {
            
                $verbsId = implode(',', $verbsId);

                $requestVerbs = $database->query("SELECT * FROM verbs WHERE id IN ($verbsId)");
                ?>
                <div class="container">
                    <form method="post" action="test-result.php">
                        <div class="table-responsive">
                            <table id="table" class="table table-condensed">
                                <tr class="th">
                                    <th> Verbe: </th>
                                    <th> Infinitif: </th>
                                    <th> Prétérit: </th>
                                    <th> Particie passé: </th>
                                </tr>
                                <form>
                                <?php
                                $index = 0;
                                while($returnVerbs = $requestVerbs->fetch()) {
                                    ?>
                                    <tr>
                                        <th><?php echo $returnVerbs['translation']; ?></th>
                                        <input type="hidden" name="<?php echo "translation".$index; ?>" value="<?php echo $returnVerbs['translation']; ?>">
                                       
                                        <th><input type="text" name="<?php echo "infinitive".$index; ?>"></th>
                                        <input type="hidden" name="<?php echo "answer-infinitive".$index; ?>" value="<?php echo $returnVerbs['infinitive']; ?>">

                                        <th><input type="text" name="<?php echo "simple-past".$index; ?>"></th>
                                        <input type="hidden" name="<?php echo "answer-simple-past".$index; ?>" value="<?php echo $returnVerbs['simple_past']; ?>">
                                     
                                        <th><input type="text" name="<?php echo "past-participle".$index; ?>"></th>
                                        <input type="hidden" name="<?php echo "answer-past-participle".$index; ?>" value="<?php echo $returnVerbs['past_participle']; ?>">
                                   
                                    </tr>
                                    <input type="hidden" name="number" value="<?php echo $number; ?>">
                                <?php
                                $index++;
                                }
                                ?>
                            </table>
                        </div>
                        <div class="col text-center">
                            <input type="submit" value="Terminer le test" class="btn btn-info">
                        </div>
                    </form>
                </div>
            <?php            
            }
        } else {
            header("Location:configuration-test.php");
        }

    } else {
        header("Location:index.php");
    }
    ?>

</body>
</html>