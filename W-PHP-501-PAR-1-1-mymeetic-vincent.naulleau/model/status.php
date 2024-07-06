<?php
    session_start();
    require('rootLog.php');
    $query = "SELECT status FROM user WHERE user.id = ?";
    $conn = new PDO("mysql:host=$host;dbname=$bddname", $user, $passeword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($query);
    $stmt->bindParam(1, implode("','", $id_user), PDO::PARAM_INT); 
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($row as $r){
        if($r['status'] = 0){
            header("Location: ../views/index.php");
            session_destroy();
        };
    }
   
?>