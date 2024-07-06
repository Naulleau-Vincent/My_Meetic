<?php
try{
    $token = bin2hex(random_bytes(32));
    require_once('../controllers/userModifTemplate.php');
    require_once('rootLog.php');
    // var_dump($infos_Modif);
    $query = "UPDATE user SET gender = ?, city = ?, email = ?, password= ? WHERE id = ?";
    $conn = new PDO("mysql:host=$host;dbname=$bddname", $user, $passeword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($query);
    $stmt->bindParam(1, $infos_Modif[0], PDO::PARAM_STR);
    $stmt->bindParam(2, $infos_Modif[1], PDO::PARAM_STR);
    $stmt->bindParam(3, $infos_Modif[2], PDO::PARAM_STR);
    $stmt->bindParam(4, $infos_Modif[3], PDO::PARAM_STR);
    $stmt->bindParam(5, implode("','", $id_user), PDO::PARAM_STR);
    $stmt->execute();
}catch(PDOException $e){
    if($e->errorInfo[1] == 1062){
        echo '<script>alert("L\'adresse e-mail est déjà utilisée. Veuillez essayer de vous connecter.");</script>';
        exit;
    }else{
        echo '<script>alert("Une erreur s\'est produite. Veuillez réessayer plus tard. code(RMU");</script>';
        exit;
    }
}finally{
    $stmt = null;
    $conn = null;
}