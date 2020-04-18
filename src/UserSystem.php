<?php


namespace Psiko;


use DateTime;
use Psiko\database\userTable;
use Psiko\Entity\userEntity;
use Psiko\helper\Notification;

class UserSystem
{

    private userTable $userDatabse;

    public function __construct()
    {
        $this->userDatabase = new \Psiko\database\userTable();

    }

    public function authentification($email, $password, $langue)
    {
        $result = array();

        $user = $this->userDatabase->getUserByMail($email);
        if (!empty($user))
        {
            if (password_verify($password,$user[0]->password))
            {
                $_SESSION["auth"] = new userEntity($user[0]->id,$user[0]->prenom,$user[0]->nom,$user[0]->email,$user[0]->adresse,$user[0]->telephone,
                    $user[0]->sexe,$user[0]->password,
                    DateTime::createFromFormat("Y-m-d",$user[0]->dateInscription),
                    DateTime::createFromFormat("Y-m-d",$user[0]->birthday),$user[0]->ecoleId,
                    $user[0]->rang,$user[0]->valider,$user[0]->photoPicture);
                $result["success"] = Notification::successLogIn($langue);
            }
            else
            {
                $result["error"] = Notification::errorNotifWrongPassword($langue);
            }
        }
        else
        {
            $result["error"] = Notification::errorNotifUserNotFoubnd($langue);
        }
        return $result;
    }


    public function inscription($POST, $langue)
    {

        $result = array();
        $isNotInDatabase = $this->userDatabase->isUserInDatabase($POST["prenom"], $_POST["nom"], $POST["email"]);
        $isMoreThan16 =  DateTime::createFromFormat("Y-m-d", $POST["birthday"])->diff(new DateTime())->y >= 16 ;
        $isSamePassword = $POST["password"] === $POST["passwordRpt"];
        var_dump($isNotInDatabase );
        if ($isSamePassword && $isNotInDatabase && $isMoreThan16)
        {
            //TODO faire le système des écoles
            $password = password_hash($POST["password"],PASSWORD_BCRYPT); ;
            $user = new userEntity(-1,$POST["prenom"],$POST["nom"],$POST["email"],$POST["adresse"],
                $POST["numeroTelephone"],$POST["sexe"],$password,new DateTime(),
                DateTime::createFromFormat("Y-m-d", $POST["birthday"]),1,
                "utilisateur",false,"default");
            $this->userDatabase->insertNewUser($user);
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

    public function getUserById($idUtilisateur)
    {
        $user = $this->userDatabase->getUserById($idUtilisateur);
        return  new userEntity($user->id,$user->prenom,$user->nom,$user->email,$user->adresse,$user->telephone,
            $user->sexe,$user->password,
            DateTime::createFromFormat("Y-m-d",$user->dateInscription),
            DateTime::createFromFormat("Y-m-d",$user->birthday),$user->ecoleId,
            $user->rang,$user->valider,$user->photoPicture);
    }
}