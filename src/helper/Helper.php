<?php

namespace Psiko\helper;

class Helper
{

    private static $passphrase = "35WAzBn3VRYk4bLxLuqnRRtQHSv6";
    private static $ciphering = "AES-128-CTR";
    private static $options = 0;
    private static $encryption_iv = '5468543522368832';


    public static function crypterString($string) {
        return openssl_encrypt($string, self::$ciphering,self::$passphrase, self::$options, self::$encryption_iv);
    }

    public static function decryptString($string) {
        return openssl_decrypt($string, self::$ciphering,self::$passphrase, self::$options, self::$encryption_iv);
    }
}