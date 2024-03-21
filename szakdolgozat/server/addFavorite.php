<?php
session_start();
require_once "connectdb.php";

extract($_POST);
extract($_SESSION);
$sql ='INSERT INTO likedmovies (userName, movieId, title, overview) VALUES (?,?,?,?)';


try {
    $stmt = $conn -> prepare($sql);
    $stmt -> execute([$name, $id, $title, $overview]);
    
    echo json_encode(["msg" => "sikeres mentes: "]);

} catch (Exception $e) {
    echo json_encode(["msg" => "sikertelen mentes:   {$e}"]);

}



?>