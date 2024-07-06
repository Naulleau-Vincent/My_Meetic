<?php
session_start();
require_once('loginTemplate.php');
$Connection = new Connection;
$token = $Connection->start();
class ValideToken extends Connection{
    public function __construct($id) {
        $this->id_User = $id;
    }
    public function Token_Validate(){
            require('../model/rootLog.php');
            $conn = new PDO("mysql:host=$host;dbname=$bddname", $user, $passeword);
            $stmt= $conn->prepare("SELECT COUNT(DATE_ADD(debut_token,interval 2 HOUR)) FROM user_log WHERE user_id = ?");
            $stmt->execute([implode($this->id_User)]);
            $count = $stmt->fetchColumn();
            return $count > 0;     
    }
}
$validator = new ValideToken($_SESSION['id_user']);
$isValid = $validator->Token_Validate();