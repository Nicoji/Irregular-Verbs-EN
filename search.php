<?php
    session_start()
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="css/list.css">
	<title> Résultat de la recherche </title> 
</head> 
<body>
<?php
    // Verify is user is connected
    if(isset($_SESSION['id'])) {
            
        if(isset($_POST['search'])) {

            $searchRequest = htmlspecialchars($_POST['search']);

            // Database connection :	
            require('database-connection.php');

            $IsThereAResult = $database->query("
            SELECT EXISTS (
                SELECT * FROM verbs
                WHERE infinitive LIKE CONCAT('%', '$searchRequest', '%')
                OR simple_past LIKE CONCAT('%', '$searchRequest', '%')
                OR past_participle LIKE CONCAT('%', '$searchRequest', '%')
                OR translation LIKE CONCAT('%', '$searchRequest', '%')
            )");

            $returnExists = $IsThereAResult->fetch();				

            // If there is at least 1 result matching
            if($returnExists['0'] >= 1) {
                
                $IsThereAResult->closeCursor();

                $request = $database->query("
                SELECT * FROM verbs
                WHERE infinitive LIKE CONCAT('%', '$searchRequest', '%')
                OR simple_past LIKE CONCAT('%', '$searchRequest', '%')
                OR past_participle LIKE CONCAT('%', '$searchRequest', '%')
                OR translation LIKE CONCAT('%', '$searchRequest', '%')
                ");

                ?>
                <div class="container">
                    <nav class="row navbar">
                        <div class="offset-md-2 col-md-2">Liste</div>
                        <div class="col-md-2">Test</div>
                        <div class="col-md-4">
                            <form method="post" action="search.php">
                                <label for="search">Rechercher: </label>
                                <input type="search" name="search" id="search" class="search">
                            </form>
                        </div>
                        <div class="dropdown show">
                            <div class="col-md-2">
                            <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="https://img.icons8.com/windows/64/000000/user-male-circle.png"/>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="change-password.php">Changer mon mot de passe</a>
                                <a class="dropdown-item" href="my-test.php?id="<?php echo $_SESSION['id'] ?>>Mes tests</a>
                                <a class="dropdown-item" href="disconnect.php">Se déconnecter</a>
                            </div>
                        </div>
                    </nav>
                    <div class="row table-head">
                        <h1 class="col-md-8"> Résultat pour '<?php echo $searchRequest ?>' : </h1>	
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

                while($return = $request->fetch()) {
                    
                    $getVerbStatus = $database->prepare("
                    SELECT * FROM verbs_learned 
                    WHERE id_user = :idUser 
                    AND id_verb = :idVerb");
                    $getVerbStatus->execute(array(
                        ":idUser" => $_SESSION['id'],
                        "idVerb" => $return['id']
                    ));
                    $returnVerbStatus = $getVerbStatus->fetch();

                    if($returnVerbStatus['status'] == 0) {
                        $class = "table-danger";
                    } elseif($returnVerbStatus['status'] == 1) {
                        $class = "table-warning";
                    } else {
                        $class = "table-success";
                    }
                    $getVerbStatus->closeCursor();

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
                                    <option selected>Modifier</option>
                                    <option value="0">Pas encore</option>
                                    <option value="1">En cours</option>
                                    <option value="2">Appris</option>
                                </select>
                                <input type="hidden" name="id-verb" value=<?php echo $return['id'] ?>>
                                <input type="submit" value="Valider" class="seeMoreBtn">
                            </form>	
                        </td>	
                    </tr> 
                <?php    
                }

                $request->closeCusor();

            } else {
            ?>			
				<p class="message"> Aucun résultat </p>
				<div class="col text-center">
					<button class="btn btn-primary align-self-center"><a href="verb-list.php" class="centerButton"> Retour </a></button>
				</div>
			<?php
            }
                        
        } else {
            header('Location:verb-list.php');
        } 
    
    } else {
        header('Location:connection.php');
    } 
    ?>

<!-- Scripts & Stylesheet to allow dropdown on profile image -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">  
</body>
</html>