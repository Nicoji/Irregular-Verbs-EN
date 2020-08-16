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

            // Database connection :
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

                // Include navbar in the page
                include('nav.php');
                ?>

                <div class="container">
                    <h1>Test</h1>
                    <form method="post" action="test-result.php">
                        <div class="table-responsive">
                            <table id="table" class="table table-condensed">
                                <tr>
                                    <th class="text-center"> Verbe: </th>
                                    <th class="text-center"> Infinitif: </th>
                                    <th class="text-center"> Prétérit: </th>
                                    <th class="text-center"> Particie passé: </th>
                                </tr>
                                <form>
                                <?php
                                $index = 0;
                                while($returnVerbs = $requestVerbs->fetch()) {
                                    ?>
                                    <tr class="text-center">
                                        <td><?php echo $returnVerbs['translation']; ?></td>
                                        <input type="hidden" name="<?php echo "translation".$index; ?>" value="<?php echo $returnVerbs['translation']; ?>">
                                       
                                        <td><input type="text" name="<?php echo "infinitive".$index; ?>"></td>
                                        <input type="hidden" name="<?php echo "answer-infinitive".$index; ?>" value="<?php echo $returnVerbs['infinitive']; ?>">

                                        <td><input type="text" name="<?php echo "simple-past".$index; ?>"></td>
                                        <input type="hidden" name="<?php echo "answer-simple-past".$index; ?>" value="<?php echo $returnVerbs['simple_past']; ?>">
                                     
                                        <td><input type="text" name="<?php echo "past-participle".$index; ?>"></td>
                                        <input type="hidden" name="<?php echo "answer-past-participle".$index; ?>" value="<?php echo $returnVerbs['past_participle']; ?>">
                                   
                                    </tr>
                                    <input type="hidden" name="number" value="<?php echo $number; ?>">
                                    <?php
                                    $index++;
                                }
                                ?>
                            </table>
                        </div>
                        <input type="hidden" name="learn" value="<?php echo $learn; ?>">
                        <div class="col text-center">
                            <input type="submit" value="Terminer le test" class="btn">
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

<!-- Scripts & Stylesheet to allow dropdown on profile image -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
</html>