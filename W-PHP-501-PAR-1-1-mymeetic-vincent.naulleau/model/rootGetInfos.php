<?php
$query = "SELECT DISTINCT loisir.name FROM loisir INNER JOIN user_loisir ON loisir.id = user_loisir.id_loisir WHERE id_user = " . implode($_SESSION['id_user']);
include('rootPlug.php');
?>