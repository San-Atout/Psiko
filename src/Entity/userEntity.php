<?php

use  Psiko\helper\Notification;

class userEntity
{

    private String $prenom;
    private String $nom;
    private String $email;
    private String $adresse;
    private String $telephone;
    private String $sexe;
    private String $password;
    private DateTime $dateInscription;
    private DateTime $birthday;
    private int $ecoleId;
    private String $rang;
    private bool $valider;
    private String $photoPicture;

    public function __construct()
    {
    }

    public function setUpUser($prenom, $nom, $email, $adresse, $telephone, $sexe, $password, $dateInscription,$birthday,$ecoleId,$rang,$valider,$photoPicture)
    {
        $this->setNom($prenom);
        $this->setPrenom($nom);
        $this->setEmail($email);
        $this->setAdresse($adresse);
        $this->setTelephone($telephone);
        $this->setSexe($sexe);
        $this->setPassword($password);
        $this->setDateInscription($dateInscription);
        $this->setBirthday($birthday);
        $this->setEcoleId($ecoleId);
        $this->setRang($rang);
        $this->setValider($valider);
        $this->setPhotoPicture($photoPicture);

    }

    public function authentification($email, $password, $langue)
    {
        $result = array();
        $userDatabase = new \Psiko\database\userTable();

        $user = $userDatabase->getUserByMail($email);
        if (!empty($user))
        {
            if (password_verify($password,$user[0]->password))
            {
                $this->setUpUser($user[0]->prenom,$user[0]->nom,$user[0]->email,$user[0]->adresse,$user[0]->telephone,
                    $user[0]->sexe,$user[0]->password,
                    DateTime::createFromFormat("Y-m-d",$user[0]->dateInscription),
                    DateTime::createFromFormat("Y-m-d",$user[0]->birthday),$user[0]->ecoleId,
                    $user[0]->rang,$user[0]->valider,$user[0]->photoPicture);
            }
           else
           {
               $result["error"]["connexion"] = Notification::errorNotifWrongPassword($langue);
           }
        }
        else
        {
            $result["error"]["connexion"] = Notification::errorNotifUserNotFoubnd($langue);
        }
        return $result;
    }


    public function inscription($POST, $langue)
    {
        $userDatabase = new \Psiko\database\userTable();

        $result = array();
        $isNotInDatabase = $userDatabase->isUserInDatabase($POST["prenom"], $_POST["nom"], $POST["email"]);
        $isMoreThan16 =  DateTime::createFromFormat("Y-m-d", $POST["birthday"])->diff(new DateTime())->y >= 16 ;
        $isSamePassword = $POST["password"] === $POST["passwordRpt"];
        var_dump($isNotInDatabase );
        if ($isSamePassword && $isNotInDatabase && $isMoreThan16)
        {
            //TODO faire le système des écoles
            $password = password_hash($POST["password"],PASSWORD_BCRYPT); ;
            $this->setUpUser($POST["prenom"],$POST["nom"],$POST["email"],$POST["adresse"],
                             $POST["numeroTelephone"],$POST["sexe"],$password,new DateTime(),
                             DateTime::createFromFormat("Y-m-d", $POST["birthday"]),1,
                            "utilisateur",false,"default");
            $userDatabase->insertNewUser($this);
        }
        else
        {
            if (!$isSamePassword) $result["error"]["SamePassword"] = Notification::errorNotifPasswordMissMatch($langue);
            if (!$isNotInDatabase) $result["error"]["allreadyDatabase"] = Notification::errorNotifAllReadyIn($langue);
            if (!$isMoreThan16) $result["error"]["toYoung"] = Notification::errorNotifTooYoung($langue);
        }
        return $result;
    }


    public function deconnexion()
    {
        setcookie('remember',NULL,-1);
        unset($_SESSION['auth']);
        return "Vous avez bien été déconnecté";
    }

    /**
     * @return String
     */
    public function getPrenom(): String
    {
        return $this->prenom;
    }

    /**
     * @param String $prenom
     */
    public function setPrenom(String $prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return String
     */
    public function getNom(): String
    {
        return $this->nom;
    }

    /**
     * @param String $nom
     */
    public function setNom(String $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return String
     */
    public function getEmail(): String
    {
        return $this->email;
    }

    /**
     * @param String $email
     */
    public function setEmail(String $email): void
    {
        $this->email = $email;
    }

    /**
     * @return String
     */
    public function getAdresse(): String
    {
        return $this->adresse;
    }

    /**
     * @param String $adresse
     */
    public function setAdresse(String $adresse): void
    {
        $this->adresse = $adresse;
    }

    /**
     * @return String
     */
    public function getTelephone(): String
    {
        return $this->telephone;
    }

    /**
     * @param String $telephone
     */
    public function setTelephone(String $telephone): void
    {
        $this->telephone = $telephone;
    }

    /**
     * @return String
     */
    public function getSexe(): String
    {
        return $this->sexe;
    }

    /**
     * @param String $sexe
     */
    public function setSexe(String $sexe): void
    {
        $this->sexe = $sexe;
    }

    /**
     * @return String
     */
    public function getPassword(): String
    {
        return $this->password;
    }

    /**
     * @param String $password
     */
    public function setPassword(String $password): void
    {
        $this->password = $password;
    }

    /**
     * @return DateTime
     */
    public function getDateInscription(): DateTime
    {
        return $this->dateInscription;
    }

    /**
     * @param DateTime $dateInscription
     */
    public function setDateInscription(DateTime $dateInscription): void
    {
        $this->dateInscription = $dateInscription;
    }

    /**
     * @return DateTime
     */
    public function getBirthday(): DateTime
    {
        return $this->birthday;
    }

    /**
     * @param DateTime $birthday
     */
    public function setBirthday(DateTime $birthday): void
    {
        $this->birthday = $birthday;
    }

    /**
     * @return int
     */
    public function getEcoleId(): int
    {
        return $this->ecoleId;
    }

    /**
     * @param int $ecoleId
     */
    public function setEcoleId(int $ecoleId): void
    {
        $this->ecoleId = $ecoleId;
    }

    /**
     * @return String
     */
    public function getRang(): String
    {
        return $this->rang;
    }

    /**
     * @param String $rang
     */
    public function setRang(String $rang): void
    {
        $this->rang = $rang;
    }

    /**
     * @return bool
     */
    public function isValider(): bool
    {
        return $this->valider;
    }

    /**
     * @param bool $valider
     */
    public function setValider(bool $valider): void
    {
        $this->valider = $valider;
    }

    /**
     * @return String
     */
    public function getPhotoPicture(): String
    {
        return $this->photoPicture;
    }

    /**
     * @param String $photoPicture
     */
    public function setPhotoPicture(String $photoPicture): void
    {
        $this->photoPicture = $photoPicture;
    }



}