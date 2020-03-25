<?php


namespace Psiko\database;


use Psiko\Entity\userEntity;

class userTable
{

    /**
     * @var MysqlDatabase
     */
    private MysqlDatabase $database;

    public function __construct()
    {
       $this->database = new MysqlDatabase("psiko");
    }

    public function getUserByMail (String $mail)
    {
        $sql = "SELECT * FROM psiko.user WHERE email=:email";
        return $this->database->prepare($sql, array(":email" => $mail));
    }


    public function isUserInDatabase($prenom, $nom, $email)
    {
        $sql = "SELECT * FROM psiko.user WHERE (`nom` = :nom AND `prenom` = :prenom) OR (`email` = :email)";
        return empty($this->database->prepare($sql, array(":prenom" => $prenom, ":nom" => $nom, ":email" => $email)));
    }

    public function insertNewUser(userEntity $user)
    {
        $sql = "INSERT INTO psiko.user (`prenom`, `nom`, `email`, `adresse`, `telephone`, `sexe`, `password`, `dateInscription`, `birthday`, `ecoleId`, `rang`, `valider`, `photoPicture`) 
                       VALUES (:prenom, :nom, :email, :adresse, :telephone, :sexe, :password, :dateInscription, :birthday, :ecoleId, :rang, :valider, :photoPicture)";
        $values = array(
            ":prenom"           => $user->getPrenom(),
            ":nom"              => $user->getNom(),
            ":email"            => $user->getEmail(),
            ":adresse"          => $user->getAdresse(),
            "telephone"         => $user->getTelephone(),
            ":sexe"             => $user->getSexe(),
            ":password"         => $user->getPassword(),
            ":dateInscription"  => $user->getDateInscription()->format('Y-m-d'),
            ":birthday"         => $user->getBirthday()->format('Y-m-d'),
            ":ecoleId"          => $user->getEcoleId(),
            ":rang"             => $user->getRang() ,
            ":valider"          => $user->isValider(),
            ":photoPicture"     => $user->getPhotoPicture()
        );
        $this->database->prepare($sql,$values);

    }
}