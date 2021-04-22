<?php

namespace Fnatic\Tools;

class Manipulador
{
    public static function convertToUrl($txt)
    {
        if ($txt == null || !is_string($txt)) {
            return '';
        }

        $string = self::tirarAcentos($txt);

        $string = self::alphaNumeric($string);

        $string = str_replace(' ', "-", $string);
        return $string;
    }
    public static function tirarAcentos($string)
    {
        return preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/", "/(ç)/", "/(Ç)/"), explode(" ", "a A e E i I o O u U n N c C"), $string);
    }

    public static function validEmail($email)
    {

        if (strpos($email, "@") === false) {
            return false;
        } else {
            if (strpos($email, ".") === false) {
                return false;
            } else {
                return true;
            }
        }
    }

    public static function accentedLetters($str)
    {
        return preg_replace("/[^a-zA-ZÀÁÃÂÉÊÍÓÕÔÚÜÇÑàáãâéêíóõôúüçñ\s]/", "", $str);
    }
    public static function letters($str)
    {
        return preg_replace("/[^a-zA-Z\s]/", "", $str);
    }
    public static function alphaNumeric($str)
    {
        return preg_replace("/[^0-9a-zA-Z\s]/", "", $str);
    }
    public static function numeric($str)
    {
        return preg_replace("/[^0-9]/", "", $str);
    }
    public static function lessSymbols($str)
    {
        return preg_replace("/[^0-9a-zA-ZÀÁÃÂÉÊÍÓÕÔÚÜÇÑàáãâéêíóõôúüçñ\s]/", "", $str);
    }
}
