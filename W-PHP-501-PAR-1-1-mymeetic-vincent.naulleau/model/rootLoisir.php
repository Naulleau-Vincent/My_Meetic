<?php
include('rootLog.php');
try{
    $query = "SELECT name FROM loisir";
    include('rootPlug.php');
    $i = 1;
    foreach($row as $r){
        echo '<li><input type="checkbox" id= "checkbox' . $i . '"' . ' name="checkbox_loisirs[]" value = "'. $r['name'] .'"><label for="checkbox' . $i . '">' . $r['name'] . '</label></li>';
        $i++;
    }
}catch(PDOException $e){
    echo "Echec de connexion: " . $e->getMessage();
    exit;
}finally{
    $sth = null;
    $conn = null;
}
?>