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
	<title> Mes tests </title> 
</head> 
<body>
<?php

    if(isset($_SESSION['id'])) {
        
        // Include nav bar
        include('nav.php');
        ?>
         
        <div class="container">

            <h1> Mes tests </h1>	
            
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
                    <tr>
                        <th class="text-center"> Date: </th>
                        <th class="text-center"> Nombre de verbes révisés: </th>
                        <th class="text-center"> verbes revisés: </th>
                        <th class="text-center"> Résultat: </th>
                    </tr>
                <?php 

                $request = $database->prepare("SELECT * FROM test WHERE id_user = :id ORDER BY date DESC");
                $request->execute(array(
                    ":id" => $_SESSION['id']
                ));

                while($return = $request->fetch()) {

                    // Transform data stocks as int in the macthing string					
                    switch($return['learn']) {
                    
                        case 0 : 
                            $return['learn'] = "Pas appris";
                        break;
                        
                        case 1 : 
                            $return['learn'] = "En cours";
                        break;
                        
                        case 2 : 
                            $return['learn'] = "Appris";
                        break;
                        
                        case 10 : 
                            $return['learn'] = "Pas appris + En cours";
                        break;
                        
                        case 20 : 
                            $return['learn'] = "Pas appris + Appris";
                        break;
                        
                        case 12 : 
                            $return['learn'] = "Appris + En cours";
                        break;
                        
                        case 120 : 
                            $return['learn'] = "Tous";
                        break;
                        
                        default : 
                        echo "N/a";
                    }
                        
                    // Changing return date data format 
                    $date = DateTime::createFromFormat('Y-m-d H:i:s', $return['date']);
                    ?>
                    <tr class="text-center">
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
                    <button class="btn align-self-center return-button"><a href="configuration-test.php"> Faire un test </a></button>
                </div>	
            <?php    
            }
       
    } else {
        header("Location:index.php");	
    }
    ?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
</html>