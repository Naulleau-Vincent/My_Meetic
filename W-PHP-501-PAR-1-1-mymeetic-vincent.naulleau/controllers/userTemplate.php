<?php
class NewUser{
    protected $prenom;
    protected $nom;
    protected $birthdate;
    protected $genre;
    protected $ville;
    protected $mail;
    protected $mdp;
    protected $hash;
    protected $infos;
    protected $is_New;
    protected $status;

    public function __construct(){
        $this->is_New = true;
        $this->prenom = isset($_POST['signup_Prenom']) ? $this->verifInput($_POST['signup_Prenom']) : null;
        $this->nom = isset($_POST['signup_Nom']) ? $this->verifInput($_POST['signup_Nom']) : null;
        $this->birthdate = isset($_POST['signup_Date']) ? $_POST['signup_Date'] : null;
        $this->genre = isset($_POST['signup_Genre']) ? $this->verifInput($_POST['signup_Genre']) : null;
        $this->ville = isset($_POST['signup_Ville']) ? $this->verifInput($_POST['signup_Ville']) : null;
        $this->mail = isset($_POST['signup_Mail']) ? $this->verifInput($_POST['signup_Mail']) : null;
        $this->mdp = isset($_POST['signup_Mdp']) ? $_POST['signup_Mdp'] : null;
        $this->hash = password_hash($this->mdp, PASSWORD_DEFAULT);
        $this->infos = [$this->prenom,$this->nom,$this->birthdate,$this->genre,$this->ville,$this->mail,$this->hash,$this->status];
        $this->status = true;
    }
    private function verifInput($input) {
        return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    }
    public function getInfos(){
        return $this->infos;
    }
    public function start(){
        if(empty($this->prenom)||empty($this->nom)||empty($this->birthdate)||empty($this->genre)||empty($this->ville)||empty($this->mail)||empty($this->mdp)){
            throw new Exception("ATTENTION, ITEM(S) VIDE");
        }else{
            echo "<script>alert('Bienvenu parmis nous !')</script>";
        }
    }
    public function getPrenom(){
        return $this->prenom;
    }
    public function getNom(){
        return $this->nom;
    }
    public function getBirthdate(){
        return $this->birthdate;
    }
    public function getGenre(){
        return $this->genre;
    }
    public function getVille(){
        return $this->ville;
    }
    public function getMail(){
        return $this->mail;
    }
}
$New_User = new NewUser();
$infos = $New_User->getInfos();