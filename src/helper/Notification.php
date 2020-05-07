<?php


namespace Psiko\helper;


class Notification
{
    public static function errorNotifPasswordMissMatch($langue)
    {
        //TODO faire les trads des erreurs les mdps ne sont pas identiques polonais / arabes / anglais
        if ($langue === "fr") $result = "Les mots de passes ne sont pas les mêmes";
        else if ($langue === "ar") $result = "كلمات المرور غير مطابقة";
        else if ($langue === "pl") $result = "";
        else                       $result = "";
        return $result ;
    }

    public static function errorNotifTooYoung($langue)
    {
        //TODO faire les trads des erreurs le gars est trop jeunes  polonais / arabes / anglais
        if ($langue === "fr") $result = "Vous êtes trop jeunes âge minimum (16 ans)";
        else if ($langue === "ar") $result = "مازلت صغيرا فالعمر الادنى هو 16 سنة   ";
        else if ($langue === "pl") $result = "";
        else                       $result = "";
        return $result ;
    }

    public static function errorNotifAllReadyIn($langue)
    {
        //TODO faire les trads des erreurs le gars est déjà la dans la base de données   polonais / arabes / anglais
        if ($langue === "fr") $result = "L'utilisateur est déjà présent dans la base de données";
        else if ($langue === "ar") $result = "المستخدم موجود مسبقا في قاعدة البيانات ";
        else if ($langue === "pl") $result = "";
        else                       $result = "";
        return $result ;
    }

    public static function errorNotifUserNotFoubnd($langue)
    {
        //TODO faire les trads des erreurs le gars n'est pas dans la base de données   polonais / arabes / anglais
        if ($langue === "fr") $result = "L'utilisateur n'as pas été trouvé dans la base de données";
        else if ($langue === "ar") $result = "لم يتم العثور على المستخدم في قاعدة البياتات";
        else if ($langue === "pl") $result = "";
        else                       $result = "";
        return $result ;
    }

    public static function errorNotifWrongPassword($langue)
    {
        //TODO faire les trads des erreurs le gars n'as pas rentré le bon mots de passe polonais / arabes / anglais
        if ($langue === "fr") $result = "le mail et le mots de passe ne corresponde pas";
        else if ($langue === "ar") $result = "البريد الالكتروني وكلمة المرور لا يتطابقان";
        else if ($langue === "pl") $result = "";
        else                       $result = "";
        return $result ;
    }

    public static function errorExtensionNotSupported($langue)
    {
        //TODO faire les trads des erreurs le gars n'as pas rentré le bon mots de passe polonais / arabes / anglais
        if ($langue === "fr") $result = "le mail et le mots de passe ne corresponde pas";
        else if ($langue === "ar") $result = "البريد الالكتروني وكلمة المرور لا يتطابقان";
        else if ($langue === "pl") $result = "";
        else                       $result = "";
        return $result ;
    }

    public static function errorFileTropLourd($langue, $depassement)
    {
        //TODO faire les trads des erreurs le gars n'as pas rentré le bon mots de passe polonais / arabes / anglais
        if ($langue === "fr") $result = "Nous sommes désolé mais votre fichier dépasse la limite de ".$depassement. " Ko";
        else if ($langue === "ar") $result = "عذرا فالملف قد تجاوز القدر المحدد ب".$depassement." (Ko)";
        else if ($langue === "pl") $result = "";
        else                       $result = "";
        return $result ;
    }

    public static function errorUploadFiles($langue)
    {
        //TODO faire les trads des erreurs le gars n'as pas rentré le bon mots de passe polonais / arabes / anglais
        if ($langue === "fr") $result = "Une erruer est arrivé durant l'upload du fichier";
        else if ($langue === "ar") $result = "حدث خطأ أثناء تحميل الملف";
        else if ($langue === "pl") $result = "";
        else                       $result = "";
        return $result ;
    }
}