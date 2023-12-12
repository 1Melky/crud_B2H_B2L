<?php
session_start();
include 'db.php';
global $db;

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id){
    $query = $db->prepare('DELETE FROM fietsen WHERE id = :id');
    $query->bindParam('id', $id);
    if ($query->execute()){
        $_SESSION['message'] = "De fiets is verwijderd";
    }else{
        $_SESSION['message'] = "Er is iets mis gegaan met de fiets verwijderen";
    }

    header('Location: index.php');
}else{
    die('ERROR 404: Bike not found');
}