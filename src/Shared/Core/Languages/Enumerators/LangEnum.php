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
 * @subpackage PHPAssists\Shared\Core\Languages\Enumerators
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 */

namespace PHPAssists\Shared\Core\Languages\Enumerators;

enum LangEnum: string {
    case en = 'English';
    case es = "Spanish";
    case ro = "Romanian";
    case fr = "French";
    case it = "Italian";
    
}
