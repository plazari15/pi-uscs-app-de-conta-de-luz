<?php

/**
 *View.class [HELPER MVC]
 * Responsavel por carregar o template, povoar e exibir a view, povoar e incluir arquivos PHP no sistema.
 * Arquitetura MVC
 * @copyright (c) 2014, Pedro Lazari    Pedro Lazari
 */
namespace Helpers;
class View {
    
    private static $Data; 
    private static $Keys;
    private static $Values;
    private static $Template;
    
    public static function Load($Template) {
        self::$Template = (string) $Template;
        self::$Template = file_get_contents(self::$Template . '.tpl.html');
        
    }
    
    public static function Show (array $Data) {
        self::SetKeys($Data);
        self::SetValues();
        self::ShowView();
    }
    
    public static function Request($File, array $Data) {
        extract($Data);
        require("{$File}.inc.php");
    }
    
    //private
    
    private static function SetKeys($Data) {
        self::$Data = $Data;
        self::$Keys = explode ('&', '#' . implode("#&#", array_keys(self::$Data)) . '#');
        
    }
    
    private static function SetValues() {
        self::$Values = array_values(self::$Data);
    }
    
    private static function ShowView() {
        echo str_replace(self::$Keys, self::$Values, self::$Template);
    }
}
