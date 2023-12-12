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
 * @subpackage PHPAssists\Shared\Core\Languages
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 * @link https://packagist.org/packages/juanma386/php-assists-class
 *
 */

namespace PHPAssists\Shared\Core\Languages;

use PHPAssists\Shared\Core\Languages\Enumerators\LangEnum;
use PHPAssists\Shared\Core\Languages\Traits\TraitProcessor;
use PHPAssists\Shared\Core\Languages\Abstracts\AbstractBaseResponse;
use PHPAssists\Shared\Core\Languages\Interfaces\InterfaceLanguageProcessor;

class LanguageProcessor extends AbstractBaseResponse  implements InterfaceLanguageProcessor {

    private string $englishFilePath = '';
    
    public static LangEnum | array $LANG; 
    public static string $DEFAULT_LANGUAGE      = self::DEFAULT_LANGUAGE; 
    public static string $SECONDARY_LANGUAGE    = self::SECONDARY_LANGUAGE; 
    public static string $APPPATH               = self::APPPATH; 
    public static string $folderDir             = self::folderDir; 
    
    use TraitProcessor;
}
