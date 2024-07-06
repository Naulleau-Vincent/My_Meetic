<?php
class ModifUser {
    protected $genre_Modif;
    protected $ville_Modif;
    protected $mail_Modif;
    protected $mdp_Modif;
    protected $hash_Modif;
    protected $infos_Modif;

    public function __construct(){
        $this->genre_Modif = isset($_POST['signup_Genre_Modif']) ? $this->verifInput($_POST['signup_Genre_Modif']) : null;
        $this->ville_Modif = isset($_POST['signup_Ville_Modif']) ? $this->verifInput($_POST['signup_Ville_Modif']) : null;
        $this->mail_Modif = isset($_POST['signup_Mail_Modif']) ? $this->verifInput($_POST['signup_Mail_Modif']) : null;
        $this->mdp_Modif = isset($_POST['signup_Mdp_Modif']) ? $_POST['signup_Mdp_Modif'] : null;
        $this->hash_Modif = password_hash($this->mdp_Modif, PASSWORD_DEFAULT);
        $this->infos_Modif = [$this->genre_Modif,$this->ville_Modif,$this->mail_Modif,$this->hash_Modif];
    }
    private function verifInput($input_Modif){
        return htmlspecialchars($input_Modif, ENT_QUOTES, 'UTF-8');
    }
    public function getInfos(){
        return $this->infos_Modif;
    }
    public function getGenre(){
        return $this->genre_Modif;
    }
    public function getVille(){
        return $this->ville_Modif;
    }
    public function getMail(){
        return $this->mail_Modif;
    }
}
$Modif_User = new ModifUser();
$infos_Modif = $Modif_User->getInfos();
session_start();
$_SESSION['is_Modif'] = false;