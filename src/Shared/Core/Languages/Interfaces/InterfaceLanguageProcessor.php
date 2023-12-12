<?php

/**
 * PHPAssists Languages API
 *
 * This class defines the possible Languages API codes for the PHPAssists Languages API.
 *
 * @link       https://hexome.com.ar
 * @since      0.0.1
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Core\Languages\Interfaces
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 * @link https://packagist.org/packages/juanma386/php-assists-class
 *
 */

namespace PHPAssists\Shared\Core\Languages\Interfaces;

interface InterfaceLanguageProcessor {

    public const APPPATH                    = "";
    public const folderDir                  = "";
    public const ROOTPATH                   = "";
    public const JSON_EXT                   = ".json";

    public const DEFAULT_LANGUAGE           = "en"; 
    public const SECONDARY_LANGUAGE         = "es"; 

    public const FRENCH_LANGUAGE_CODE       = "fr"; 
    public const GERMAN_LANGUAGE_CODE       = "de"; 
    public const CHINESE_LANGUAGE_CODE      = "zh";
    public const JAPANESE_LANGUAGE_CODE     = "ja";
    public const ARABIC_LANGUAGE_CODE       = "ar"; 
    public const RUSSIAN_LANGUAGE_CODE      = "ru";
    public const PORTUGUESE_LANGUAGE_CODE   = "pt";
    public const HINDI_LANGUAGE_CODE        = "hi"; 
    public const BENGALI_LANGUAGE_CODE      = "bn"; 
    public const URDU_LANGUAGE_CODE         = "ur"; 
    
    public const REGEX_DEFAULTLANGUAGE      = "/(.*);q=([0-1]{0,1}.\d{0,4})/i";
    public const REGEX_HTMLPARSE            = '/([a-zA-Z\-]+)(?:;q=([0-1]{0,1}\.\d{0,4}))?/';
}
