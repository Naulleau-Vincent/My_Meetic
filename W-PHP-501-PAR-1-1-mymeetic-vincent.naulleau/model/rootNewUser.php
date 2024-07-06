<?php
try {
    $token = bin2hex(random_bytes(32));
    require_once('../controllers/userTemplate.php');
    require_once('rootLog.php');
    //Ma requête afin d'inserer un nouvel user
    $t = true;
    $query = "INSERT INTO user (firstname, lastname, birthdate, gender, city, email, password, status) VALUES (?, ?, ?, ?, ?, ?,?,?)";
    $conn = new PDO("mysql:host=$host;dbname=$bddname", $user, $passeword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($query);
    $stmt->bindParam(1, $infos[0], PDO::PARAM_STR);
    $stmt->bindParam(2, $infos[1], PDO::PARAM_STR);
    $stmt->bindParam(3, $infos[2], PDO::PARAM_STR);
    $stmt->bindParam(4, $infos[3], PDO::PARAM_STR);
    $stmt->bindParam(5, $infos[4], PDO::PARAM_STR);
    $stmt->bindParam(6, $infos[5], PDO::PARAM_STR);
    $stmt->bindParam(7, $infos[6], PDO::PARAM_STR);
    $stmt->bindParam(8, $t, PDO::PARAM_STR);
    $stmt->execute();
    //Ma requete afin de récupérer l'id générer de cet user
    $stmt = $conn->prepare("SELECT user.id, status FROM user WHERE firstname = ? AND lastname = ?");
    $stmt->bindParam(1, $infos[0], PDO::PARAM_STR);
    $stmt->bindParam(2, $infos[1], PDO::PARAM_STR);
    $stmt->execute();

    $row = $stmt->fetchAll(PDO::FETCH_DEFAULT);
    foreach($row as $r){
        $id_user[] =  $r['id'];
        $user_Status[]= $r['status']; 
    }
    $stmt = $conn->prepare("INSERT INTO user_log (user_id, debut_token, fin_token, token) VALUES (?, ?, ?,?)");
    $end_Token = date('Y-m-d H:i:s', time()+7200);
    $stmt->execute([implode($id_user), date('Y-m-d H:i:s'),$end_Token,$token]);
    //Ma fonction pour l'envoyer sur le serveur pour l'utiliser dans d'autres fichiers
    session_start();
    $_SESSION['is_New'] = true;
    $_SESSION['id_user'] = $id_user;
    $_SESSION['user_Status'] = $user_Status;    
}catch(PDOException $e){
    if($e->errorInfo[1] == 1062){
        echo '<script>alert("L\'adresse e-mail est déjà utilisée. Veuillez essayer de vous connecter.");</script>';
        exit;
    }else{
        echo '<script>alert("Une erreur s\'est produite. Veuillez réessayer plus tard. code(RNU)");</script>';
        exit;
    }
}finally{
    $stmt = null;
    $conn = null;
}
?>