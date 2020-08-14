<?php 

$host = 'localhost';
$dbname = 'english';
$userDb = 'root';
$passwordDb = 'mysql';

try
{
    $database = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $userDb, $passwordDb);
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}