<?php
include('rootLog.php');
session_start();
$id_user = $_SESSION['id_user'];
$query = "UPDATE user SET status = 0 WHERE id = ?";
$conn = new PDO("mysql:host=$host;dbname=$bddname", $user, $passeword);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare($query);
$stmt->bindParam(1, implode("','", $id_user), PDO::PARAM_STR);
$stmt->execute();
$status = false;