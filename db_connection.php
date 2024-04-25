<?php

$host = "";
$username = "";
$password = "";
$database = "";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}
?>
