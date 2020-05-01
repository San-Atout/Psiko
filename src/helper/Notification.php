<?php


namespace Psiko\helper;


class Notification
{
    public static function errorNotifPasswordMissMatch($langue)
    {
        //TODO faire les trads des erreurs les mdps ne sont pas identiques polonais / arabes / anglais
        if ($langue === "fr") $result = "Les mots de passes ne sont pas les mêmes";
        else if ($langue === "ar") $result = "";
        else if ($langue === "pl") $result = "";
        else                       $result = "";
        return $result ;
    }

    public static function errorNotifTooYoung($langue)
    {
        //TODO faire les trads des erreurs le gars est trop jeunes  polonais / arabes / anglais
        if ($langue === "fr") $result = "Vous êtes trop jeunes âge minimum (16 ans)";
        else if ($langue === "ar") $result = "";
        else if ($langue === "pl") $result = "";
        else                       $result = "";
        return $result ;
    }

    public static function errorNotifAllReadyIn($langue)
    {
        //TODO faire les trads des erreurs le gars est déjà la dans la base de données   polonais / arabes / anglais
        if ($langue === "fr") $result = "L'utilisateur est déjà présent dans la base de données";
        else if ($langue === "ar") $result = "";
        else if ($langue === "pl") $result = "";
        else                       $result = "";
        return $result ;
    }

    public static function errorNotifUserNotFoubnd($langue)
    {
        //TODO faire les trads des erreurs le gars n'est pas dans la base de données   polonais / arabes / anglais
        if ($langue === "fr") $result = "L'utilisateur n'as pas été trouvé dans la base de données";
        else if ($langue === "ar") $result = "";
        else if ($langue === "pl") $result = "";
        else                       $result = "";
        return $result ;
    }

    public static function errorNotifWrongPassword($langue)
    {
        //TODO faire les trads des erreurs le gars n'as pas rentré le bon mots de passe polonais / arabes / anglais
        if ($langue === "fr") $result = "le mail et le mots de passe ne corresponde pas";
        else if ($langue === "ar") $result = "";
        else if ($langue === "pl") $result = "";
        else                       $result = "";
        return $result ;
    }

    public static function errorExtensionNotSupported($langue)
    {
        //TODO faire les trads des erreurs le gars n'as pas rentré le bon mots de passe polonais / arabes / anglais
        if ($langue === "fr")      $result = "le mail et le mots de passe ne corresponde pas";
        else if ($langue === "ar") $result = "";
        else if ($langue === "pl") $result = "";
        else                       $result = "";
        return $result ;
    }

    public static function errorFileTropLourd($langue, $depassement)
    {
        //TODO faire les trads des erreurs le gars n'as pas rentré le bon mots de passe polonais / arabes / anglais
        if ($langue === "fr")      $result = "Nous sommes désolé mais votre fichier dépasse la limite de ".$depassement. " Ko";
        else if ($langue === "ar") $result = "";
        else if ($langue === "pl") $result = "";
        else                       $result = "";
        return $result ;
    }

    public static function errorUploadFiles($langue)
    {
        //TODO faire les trads des erreurs le gars n'as pas rentré le bon mots de passe polonais / arabes / anglais
        if ($langue === "fr")      $result = "Une erruer est arrivé durant l'upload du fichier";
        else if ($langue === "ar") $result = "";
        else if ($langue === "pl") $result = "";
        else                       $result = "";
        return $result ;
    }

    public static function successAddNewQuestion(String $langue)
    {
        //TODO faire les trads du succes de l'ajout de la nouvelle question polonais / arabes / anglais
        if ($langue === "fr")      $result = "La question a bien été ajouté à la FAQ !";
        else if ($langue === "ar") $result = "";
        else if ($langue === "pl") $result = "";
        else                       $result = "";
        return $result ;
    }

    public static function errorAddNewQuestion(String $langue)
    {
        //TODO faire les trads de l'erreur  de l'ajout de la nouvelle question polonais / arabes / anglais
        if ($langue === "fr")      $result = "Un problème est apparu durant l'ajout de la question...";
        else if ($langue === "ar") $result = "";
        else if ($langue === "pl") $result = "";
        else                       $result = "";
        return $result ;
    }

    public static function successUpdateFAQ(string $langue)
    {
        //TODO faire les trads de l'erreur  de l'ajout de la nouvelle question polonais / arabes / anglais
        if ($langue === "fr")      $result = "La modification de la question a bien été effectué ";
        else if ($langue === "ar") $result = "";
        else if ($langue === "pl") $result = "";
        else                       $result = "";
        return $result ;
    }

    public static function errorUpdateFAQ(string $langue)
    {
        //TODO faire les trads de l'erreur lors de la modification d'une question polonais / arabes / anglais
        if ($langue === "fr")      $result = "Une erreur est intervenu dans le processus de modification de la question";
        else if ($langue === "ar") $result = "";
        else if ($langue === "pl") $result = "";
        else                       $result = "";
        return $result ;
    }

    public static function successDeconnexion($langue)
    {
        //TODO faire les trads de l'erreur lors de la déconnexion polonais / arabes / anglais
        if ($langue === "fr")      $result = "Vous avez bien été déconnecté";
        else if ($langue === "ar") $result = "";
        else if ($langue === "pl") $result = "";
        else                       $result = "";
        return $result ;
    }

    public static function successLogIn($langue)
    {
        //TODO faire les trads pour le success de la connexion polonais / arabes / anglais
        if ($langue === "fr")      $result = "Vous êtes maintenant connecté";
        else if ($langue === "ar") $result = "";
        else if ($langue === "pl") $result = "";
        else                       $result = "";
        return $result ;
    }

    public static function successChangeEmail($langue)
    {
        //TODO faire les trads pour successChangeEmail polonais / arabes / anglais
        if ($langue === "fr")      $result = "Votre adresse email a bien été changé";
        else if ($langue === "ar") $result = "";
        else if ($langue === "pl") $result = "";
        else                       $result = "";
        return $result ;
    }

    public static function errorEmailAllReadyExist($langue)
    {
        //TODO faire les trads pour errorEmailAllReadyExist polonais / arabes / anglais
        if ($langue === "fr")      $result = "Cette email est déjà utilisé merci d'en choisir un autre";
        else if ($langue === "ar") $result = "";
        else if ($langue === "pl") $result = "";
        else                       $result = "";
        return $result ;
    }

    public static function warningSameSexe(string $langue)
    {
        //TODO faire les trads pour le success de la connexion polonais / arabes / anglais
        if ($langue === "fr")      $result = "Aucun changement dans le sexe detecté";
        else if ($langue === "ar") $result = "";
        else if ($langue === "pl") $result = "";
        else                       $result = "";
        return $result ;
    }

    public static function sucessChangement(string $langue)
    {
        //TODO faire les trads pour le changement générique polonais / arabes / anglais
        if ($langue === "fr")      $result = "Changement effectué";
        else if ($langue === "ar") $result = "";
        else if ($langue === "pl") $result = "";
        else                       $result = "";
        return $result ;
    }

    public static function sucessChangementMdp(string $langue)
    {
        //TODO faire les trads pour le changement de mot de passe polonais / arabes / anglais
        if ($langue === "fr")      $result = "Changement de mot de passe effectué";
        else if ($langue === "ar") $result = "";
        else if ($langue === "pl") $result = "";
        else                       $result = "";
        return $result ;
    }

    public static function isValide($langue)
    {
        //TODO traducction des validations user
        if ($langue === "fr")       $result = "utilisateur validé";
        else if ($langue === "ar")  $result = "";
        else if ($langue === "pl")  $result = "";
        else                        $result = "";
        return $result;

    }

    public static function isBanned($langue)
    {
        //TODO traducction des ban user
        if ($langue === "fr")       $result = "utilisateur banni";
        else if ($langue === "ar")  $result = "";
        else if ($langue === "pl")  $result = "";
        else                        $result = "";
        return $result;
    }

    public static function DateDebutSupDatefin(string $langue)
    {
        //TODO traducction des DateDebutSupDatefin
        if ($langue === "fr")       $result = "La date de recherche du début est supérieur a la date de fin";
        else if ($langue === "ar")  $result = "";
        else if ($langue === "pl")  $result = "";
        else                        $result = "";
        return $result;
    }
}