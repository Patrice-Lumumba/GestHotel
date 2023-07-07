<?php
class User{
    private $user_id;
    private $nom;
    private $prenom;
    private $email;
    private $mdp;
    private $tel;
    private $checkIn;
    private $checkOut;


    public function __construct($user_id, $nom, $prenom, $email, $mdp, $tel, $checkIn, $checkOut){
        $this->user_id = $user_id;
        $this-> nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->mdp = $mdp;
        $this->tel = $tel;
        $this->checkIn = $checkIn;
        $this->checkOut = $checkOut;

    }

    /**
     * @return mixed
     */
    public function getUserId(){ return $this->user_id;}
    public function setUserId($user_id){ $this->user_id = $user_id;}

    public function getNom(){ return $this->nom;}
    public function setNom($prenom){ return $this->nom;}

    public function getPrenom(){ return $this->prenom;}
    public function setPrenom($prenom){ return $this->prenom;}

    public function getEmail(){ return $this->email;}
    public function setEmail($email){ return $this->email;}

    public function getMdp(){ return $this->mdp;}
    public function setMdp($mdp){ return $this->mdp;}

    public function getTel(){ return $this->tel;}
    public function setTel($tel){ return $this->tel;}

    public function getCheck_in(){ return $this->checkIn;}
    public function setCheck_in($check_in){ return $this->checkIn;}

    public function getCheck_out(){ return $this->checkOut;}
    public function setCheck_out($check_out){ return $this->checkOut;}

}

