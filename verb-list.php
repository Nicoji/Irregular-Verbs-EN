<?php
    session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="css/list.css">
	<title> Verbes irrégulier - Anglais </title> 
</head> 
<body>
<?php
	
	// Verify is user is connected
	if(isset($_SESSION['id'])) {

        // Include nav bar 
        include('nav.php');
        ?>
        
        <div class="container">

            <div class="row table-head">
                <h1 class="col-md-8"> Verbes irréguliers Anglais </h1>	
                <div class="col-md-4 legend-div">
                    <div class="box-legend learn table-success"></div>
                    <div class="legend-text">Appris</div>
                    <div class="box-legend learn table-warning"></div> 
                    <div class="legend-text">En cours</div>
                    <div class="box-legend learn table-danger"></div> 
                    <div class="legend-text">Pas encore</div>
                </div>
            </div>
            
            <div class="table-responsive">
                <table id="table" class="table table-condensed">
                    <tr class="th">
                        <th> Infinitif: </th>
                        <th> Prétérit: </th>
                        <th> Particie passé: </th>
                        <th> Traduction: </th>
                        <th> Appris: </th>
                    </tr>
                <?php 

                // Database connection :	
                require('database-connection.php');
                           
                $getVerbStatus = $database->prepare("SELECT * FROM verbs_learned WHERE id_user = :id");
                $getVerbStatus->execute(array(
                    ":id" => $_SESSION['id']
                ));
                
                $idArray = [];
                $idIndex = 1;

                while($returnStatus = $getVerbStatus->fetch()) {
                    $idArray[$idIndex] = $returnStatus['status'];
                    $idIndex++;
                }
                $getVerbStatus->fetch();

                $request = $database->query("SELECT * FROM verbs");
                $i = 1;
                
                while($return = $request->fetch()) { 
                    
                    if($idArray[$i] == 0) {
                        $class = "table-danger";
                    } elseif($idArray[$i] == 1) {
                        $class = "table-warning";
                    } else {
                        $class = "table-success";
                    }
                    $i++;                   
                    ?>	

                    <tr class="<?php echo $class ?>">
                        <td><?php echo $return['infinitive']; ?></td>
                        <td><?php echo $return['simple_past']; ?></td>
                        <td><?php echo $return['past_participle']; ?></td>
                        <td><?php echo $return['translation']; ?></td>
                        <td>
                            <form method="post" action="change-verb-status.php"> 
                                <input type="hidden" name="id" value="<?php// echo $return['id']; ?>">
                                <input type="hidden" name="pageId" value="<?php //echo $idPage; ?>">
                                <select name="learned">
                                    <option selected disabled>Modifier</option>
                                    <option value="0">Pas encore</option>
                                    <option value="1">En cours</option>
                                    <option value="2">Appris</option>
                                </select>
                                <input type="hidden" name="id-verb" value=<?php echo $return['id'] ?>>
                                <input type="submit" value="Valider" class="btn btn-info">
                            </form>	
                        </td>	
                    </tr> 
<?php			
                } 
                $request->closeCursor();

	// User isn't connected	
	} else {
		header("Location:connection.php");
	} 	
?>
<!-- Scripts & Stylesheet to allow dropdown on profile image -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">  
</body>
</html>