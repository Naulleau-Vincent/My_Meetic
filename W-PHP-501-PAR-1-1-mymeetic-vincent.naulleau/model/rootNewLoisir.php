<?php
require_once('../controllers/loisirTemplate.php');
require('rootLog.php');

$query = "SELECT id FROM loisir WHERE name IN (";
$query .= "'" . implode("','", $listeLoisirs) . "')";
$tmp= [];
$mpr = [];

session_start();
$id_user = $_SESSION['id_user']; // <--Pour vous montrez a quel point jsuis teubé je vous le laisse, c'est cadeau.
require('rootPlug.php');
$conn = null;
$stmt = null;

foreach($row as $r){
    $tmp [] = implode(',',$r);
}
foreach($tmp as $mp){
    $mpr[] = $mp;
}
if($_SESSION['is_New']){
    $query = "INSERT INTO user_loisir (id_user,id_loisir) VALUES (?,?)";
}
$conn = new PDO("mysql:host=$host;dbname=$bddname", $user, $passeword);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare($query);
for($i = 0; $i < count($mpr); $i ++){
    $stmt->bindParam(1, $id_user[0], PDO::PARAM_INT); 
    $stmt->bindParam(2, $mpr[$i], PDO::PARAM_INT);
    $stmt->execute();
}
$conn = null;
$stmt = null;
session_start();
$_SESSION['mpr'] = $mpr;