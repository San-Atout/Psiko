<?php


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

    public function __construct($result)
    {
        var_dump($result);
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