<?php
    session_start();

    if(isset($_SESSION['id'])) {

        if(isset($_POST['learned']) && isset($_POST['id-verb'])) {
            
            $learn = $_POST['learned'];
            $idVerb = $_POST['id-verb'];

            require('database-connection.php');

            $request = $database->prepare("
            UPDATE verbs_learned 
            SET status = :status 
            WHERE id_user = :idUser 
            AND id_verb = :idVerb");
            $request->execute(array(
                ":status" => $learn,
                "idUser" => $_SESSION['id'],
                "idVerb" => $idVerb
            ));

            header("Location:verb-list.php");

        } else {
            header("Location:index.php");
        }

    } else {
        header("Location:index.php");
    }