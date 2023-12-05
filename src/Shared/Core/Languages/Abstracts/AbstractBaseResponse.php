<?php

/**
 * PHPAssists Languages API
 *
 * This class defines the possible Languages API codes for the PHPAssists Languages API.
 *
 * @link       https://hexome.com.ar
 * @since      1.0.0
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Core\Languages\Abstracts
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 */

namespace PHPAssists\Shared\Core\Languages\Abstracts;
use PHPAssists\Shared\Core\Languages\Enumerators\LangEnum;
use PHPAssists\Shared\Core\Languages\Interfaces\InterfaceLanguageProcessor;

abstract class AbstractBaseResponse implements InterfaceLanguageProcessor {
    
    private string $englishFilePath = '';

    public static ? string $fileName              = '';
    public static ? string $filePath              = ''; 

    public static LangEnum | string $language_code         = LangEnum::en->value; 
    public static string $DEFAULT_LANGUAGE      = self::DEFAULT_LANGUAGE; 
    public static string $SECONDARY_LANGUAGE    = self::SECONDARY_LANGUAGE; 
    public static string $APPPATH               = self::APPPATH; 
    public static string $ROOTPATH              = self::ROOTPATH; 
    public static string $folderDir             = self::folderDir; 

    abstract public static function parseDefaultLanguageHTML($http_accept, $deflang = null);
    abstract public static function getDefaultLanguageHTML();
    abstract public function parseDefaultLanguage($http_accept, $deflang = null);
    abstract public function fetchTestFrontendLangData($frontendModel) : array;
    public function __construct(?string $APPPATH = null, ?string $folderDir = null) {
        if($APPPATH) {
            self::setAppPath( $APPPATH );
        } 
        if (isset(self::$APPPATH) && !empty(self::$APPPATH)) {
            self::initPath();    
        }
   }

    public static function initPath() : void {
        $fileName = self::getLanguageCode();
        self::setFileName($fileName);
        $filePath = self::getFilePath(); 
        self::setFilePath($filePath);
    }

    public static function getFileName() : ? string {
        return self::$fileName;
    }

    public static function getPath() : ? string {
        return self::$APPPATH;
    }
    
    public static function getFilePath() : ? string {
        return self::$filePath;
    }
    
    public static function getLanguageCode() : ? string {
        return self::$language_code;
    }

    public static function setAppPath( ? string $APPPATH ) : void {
        self::$APPPATH = $APPPATH;
    }
    
    public static function setFileName( ? string $fileName ) : void {
        self::$fileName = strtolower($fileName) . self::JSON_EXT;
    }

    public static function setFilePath( ? string $filePath ) : void {
        self::$filePath = self::getPath() .  DIRECTORY_SEPARATOR . self::getFileName();
    }

    abstract function get_phrase($phrase = '', $p = false) : ? string;
}