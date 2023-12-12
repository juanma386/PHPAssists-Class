<?php namespace PHPAssists\Shared\Core\ThirdParty\Stripe;
/**
 * PHPAssists Stripe API
 *
 * This class defines the possible Stripe API algo for the PHPAssists Stripe API.
 *
 * @link       https://hexome.com.ar
 * @link       https://hexome.cloud
 * @link       https://hexome.es
 * @since      0.0.5
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Core\ThirdParty\Stripe
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 * @link https://packagist.org/packages/juanma386/php-assists-class
 *
 */

class StripeChecker {
    private $stripeAvailable;
    public function __construct() { $this->stripeAvailable = class_exists('\Stripe\Stripe'); }
    public function check() : bool {
        return $this->stripeAvailable ? true : false;
    }
}
