<?php
session_start();
class Connection{
    protected $mail_Login;
    protected $mdp_Login;
    protected $infos_Login;
    protected $query;
    protected $token;
    protected $duree_Token = 7200;
    protected $id_User;
    protected $is_New;
    protected $status;

    public function __construct(){
        $this->mail_Login = isset($_POST['mail_login']) ? $this->verifInput($_POST['mail_login']) : null;
        $this->mdp_Login = isset($_POST['mdp_login']) ? $_POST['mdp_login'] : null;
        $this->hash_Login = password_hash($this->mdp_Login, PASSWORD_DEFAULT);
        $this->query = "SELECT password AS mdp FROM user WHERE email = '" . $this->mail_Login . "'" ;
        $this->password_Verif = $this->verif_Password($this->mdp_Login,$this->query);
        $this->id_User = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : null;
        $this->is_New = isset($_SESSION['is_New']) ? $_SESSION['is_New'] : false;
        $this->infos_Login = [$this->mail_Login,$this->hash_Login,$this->query,$this->password_Verif];
        $this->status = isset($_SESSION['user_Status']) ? $_SESSION['user_Status'] : null;
    }
    public function getUser_Id(){
        return $this->id_User;
    }

    private function verifInput($input) {
        return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    }
    public function settToken($user_id,$token,$fin_Token,){
        require('../model/rootLog.php');
        $conn = new PDO("mysql:host=$host;dbname=$bddname", $user, $passeword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("INSERT INTO user_log (user_id, debut_token, fin_token, token) VALUES (?, ?, ?,?)");
        $end_Token = date('Y-m-d H:i:s', $fin_Token);
        $stmt->execute([implode($this->id_User), date('Y-m-d H:i:s'),$end_Token,$token]);
    }
    public function verif_Password($mdp,$query){
        include('../model/rootLog.php');
        include('../model/rootPlug.php');
        foreach($row as $r){
            return password_verify($mdp,$r['mdp']);
        }
    }
    public function getInfos(){
        return $this->infos_Login;
    }
    public function getToken() {
        return $this->token;
    }
    public function start(){
        if($this->password_Verif || $this->is_New){
            $this->token = bin2hex(random_bytes(32));
            if($this->is_New){
            $this->settToken($this->id_User,$this->token,time() + $this->duree_Token);}
            return $this->token;
        }else{
            header("Location: ../views/index.php");
            echo("<script>alert('Erreur mdp')</script>");
            exit;
        }
    }
}