<?php

/**
 * Check [HELPER]
 * Classe responsável por manipular e validar dados do sistema.
 * @copyright (c) 2014, Pedro Lazari    Pedro Lazari
 */
namespace Helpers;
class Check {

    private static $Data;
    private static $Format;

    public static function Email($Email) {
        self::$Data = (string) $Email;
        self::$Format = '/[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\.\-]+\.[a-z]{2,4}$/';

        if (preg_match(self::$Format, self::$Data)):
            return true;
        else:
            return false;
        endif;
    }

    public static function Name($Name) {
        self::$Format = array();
        self::$Format['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª';
        self::$Format['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';

        self::$Data = strtr(utf8_decode($Name), utf8_decode(self::$Format['a']), self::$Format['b']);
        self::$Data = strip_tags(self::$Data);
        self::$Data = str_replace(' ', '-', self::$Data);
        self::$Data = str_replace(array('-----', '----', '---', '--'), '-', self::$Data);
        return strtolower(utf8_decode(self::$Data));
    }

    public static function Data($Data) {
        self::$Format = explode(' ', $Data);
        self::$Data = explode('/', self::$Format[0]);

        if (empty(self::$Format[1])):
            self::$Format[1] = date('H:i:s');
        endif;

        self::$Data = self::$Data[2] . '-' . self::$Data[1] . '-' . self::$Data[0] . ' ' . self::$Format[1];
        return self::$Data;
    }

    public static function Words($String, $Limiter, $Pointer = null) {
        self::$Data = strip_tags(trim($String));
        self::$Format = (int) $Limiter;

        $ArrWords = explode(' ', self::$Data);
        $NumWords = count($ArrWords);
        $NewWords = implode(' ', array_slice($ArrWords, 0, self::$Format));
        $Pointer = (empty($Pointer) ? '...' : ' ' . $Pointer);
        $Result = (self::$Format < $NumWords ? $NewWords . $Pointer : self::$Data);
        return $Result;
    }

    public static function CatByName($CategoryName) {
        $Read = new Read();
        $Read->ExeRead('ws_categories', "WHERE category_name = :name", "name={$CategoryName}");
        if ($Read->GetRowCount()):
            return $Read->GetResult()[0]['category_id'];
        else:
            echo "Categoria {$CategoryName} não encontrada";
            die;
        endif;
    }

    public static function UserOnline() {
        $now = date('Y-m-d H:i:s');
        $DeleteuserOnline = new Delete;
        $DeleteuserOnline->ExeDelete('ws_siteviews_online', "WHERE online_endview < :now", "now={$now}");

        $readuserOnline = new Read;
        $readuserOnline->ExeRead('ws_siteviews_online');
        return $readuserOnline->GetRowCount();
    }

    public static function Image($ImageURL, $ImageDesc, $ImageW = null, $ImageH = null) {
        self::$Data = $ImageURL;
        if (file_exists(self::$Data) && !is_dir(self::$Data)):
            $patch = HOME;
            $image = self::$Data;
//            return $patch . $image;
            return "<img src=\"{$patch}/tim.php?src={$patch}/{$image}&w={$ImageW}&h={$ImageH}\" alt=\"{$ImageDesc}\" title=\"{$ImageDesc}\" />";
        else:
            return FALSE;
        endif;
    }

}
