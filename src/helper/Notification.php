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
}