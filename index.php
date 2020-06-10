<?php
session_start();

if(isset($_SESSION['id'])) {

    require('verb-list.php');

} else {
    
    require('connection.php');
}