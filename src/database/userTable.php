<?php


namespace Psiko\database;


class userTable
{

    /**
     * @var MysqlDatabase
     */
    private MysqlDatabase $database;

    public function __construct()
    {
       $this->database = new MysqlDatabase("user");
    }

    public function getUserByMail (String $mail)
    {
        $sql = "SELECT * FROM psiko.user WHERE email=:email";
        return new \userEntity($this->database->prepare($sql, array(":email" => $mail)));
    }


    public function insertNewUser(\userEntity $user)
    {
        $sql = "INSERT INTO `user`(`prenom`, `nom`, `email`, `adresse`, `telephone`, `sexe`, `password`, `dateInscription`, `birthday`, `ecoleId`, `rang`, `valider`, `photoPicture`) 
                       VALUES (:prenom, :nom, :email, :adresse, :telephone, :sexe, :password, :dateInscription, :birthday, :ecoleId, :rang, :valider, :photoPicture)";
        $values = array(
            ":prenom"           => $user->getPrenom(),
            ":nom"              => $user->getNom(),
            ":email"            => $user->getEmail(),
            ":adresse"          => $user->getAdresse(),
            "telephone"         => $user->getTelephone(),
            ":sexe"             => $user->getSexe(),
            ":password"         => $user->getPassword(),
            ":dateInscription"  => $user->getDateInscription(),
            ":birthday"         => $user->getBirthday(),
            ":ecoleId"          => $user->getEcoleId(),
            ":rang"             => $user->getRang() ,
            ":valider"          => $user->isValider(),
            ":photoPicture"     => $user->getPhotoPicture()
        );
        $this->database->prepare($sql,$values);
    }
}