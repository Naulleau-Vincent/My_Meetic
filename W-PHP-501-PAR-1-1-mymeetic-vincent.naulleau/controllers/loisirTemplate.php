<?php
class NewLoisirs  {
    protected $loisirs;

    public function __construct(){
        $this->loisirs = isset($_POST['checkbox_loisirs']) ? $_POST['checkbox_loisirs'] : [];
    }
    public function addLoisirs($a){
        $this->loisirs[] = $a;
    }
    public function getLoisirs(){
        return $this->loisirs;
    }
    
}
$New_Loisirs = new NewLoisirs();
$listeLoisirs = $New_Loisirs->getLoisirs();
// /On créer une classe champion variable auto hit range etc
// /Les classes enfantds genre skins, etc
