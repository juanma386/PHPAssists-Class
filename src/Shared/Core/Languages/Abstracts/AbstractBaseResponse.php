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
            self::$APPPATH = dirname(dirname($APPPATH));
        } 

        if ($folderDir) {
            self::$folderDir = DIRECTORY_SEPARATOR . $folderDir;
        }

        if ($folderDir && $APPPATH) {
            self::$ROOTPATH  = self::APPPATH . self::folderDir . DIRECTORY_SEPARATOR;
            $appPath = self::$APPPATH;
            $rootPath = self::$ROOTPATH;
        }
        
        if (isset($appPath) && !empty($appPath) && !defined('APPPATH')) {
            define('APPPATH', $appPath);
        }
        
        if (isset($rootPath) && !empty($rootPath) && !defined('ROOTPATH')) {
            define('ROOTPATH', $rootPath);
        }


        if (!empty(self::$ROOTPATH) && !file_exists(self::$ROOTPATH)) {
            
        }

        $fileName = self::$language_code . '.json';
        $this->setFileName($fileName);
        $filePath = self::$APPPATH .  DIRECTORY_SEPARATOR . strtolower($this->getFileName()); 
        $this->setFilePath($filePath);
      //  echo var_dump($this->getFilePath());
    }

    public static function getFileName() : ? string {
        return self::$fileName;
    }

    public static function getFilePath() : ? string {
        return self::$filePath;
    }
    
    public static function setFileName( ? string $fileName ) : void {
        self::$fileName = strtolower($fileName) . self::JSON_EXT;
    }

    public static function setFilePath( ? string $filePath ) : void {
        self::$filePath = $filePath .  DIRECTORY_SEPARATOR . self::getFileName();
    }

    
}