<?php 

$host = 'localhost';
$dbname = 'english';
$user = 'root';
$password = 'mysql';

try
{
    $database = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
