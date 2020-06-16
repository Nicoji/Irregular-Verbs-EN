<?php 
    session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="css/form.css">
	<title> Mes tests </title> 
</head> 
<body>
<?php

    if(isset($_SESSION['id'])) {
        ?>
        <div class="container">
            
            <!-- Include nav bar -->
            <?php include('nav.php'); ?>

            <h1 class="col-md-8"> Mes tests </h1>	
            
            <?php 
            // Database connection :	
            require('database-connection.php');

            $isThereTest = $database->prepare("
            SELECT EXISTS (SELECT * FROM test 
            WHERE id_user = :id)
            ");
            $isThereTest->execute(array(
                ":id" => $_SESSION['id']
            ));
            $returnTest = $isThereTest->fetch();

            if($returnTest[0] >= 1) {
                ?>
                <div class="table-responsive">
                <table id="table" class="table table-condensed">
                    <tr class="th">
                        <th> Date: </th>
                        <th> Nombre de verbes révisés: </th>
                        <th> verbes revisés: </th>
                        <th> Résultat: </th>
                    </tr>
                <?php 

                $request = $database->prepare("SELECT * FROM test WHERE id_user = :id");
                $request->execute(array(
                    ":id" => $_SESSION['id']
                ));
                $return = $request->fetch();

                // Changing return date data format 
                $date = DateTime::createFromFormat('Y-m-d H:i:s', $return['date']);

                while($return = $request->fetch()) {
                    ?>
                    <tr>
                        <td><?php echo $date->format('d/m/Y'); ?></td>
                        <td><?php echo $return['number']; ?></td>
                        <td><?php echo $return['learn']; ?></td>
                        <td><?php echo $return['result']."%"; ?></td>
                    </tr>
                <?php    
                }
                ?>
                </table>
                </div>
            
            <?php
            } else {
                ?>
                <p class="message"> Vous n'avez encore jamais passer de test </p>
                <div class="col text-center">
                    <button class="btn btn-info align-self-center return-button"><a href="configuration-test.php" class="return-link"> Faire un test </a></button>
                </div>	
            <?php    
            }
       
    } else {
        header("Location:index.php");	
    }
    ?>
</body>
</html>