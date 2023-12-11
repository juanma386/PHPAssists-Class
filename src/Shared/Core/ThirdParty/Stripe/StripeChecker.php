<?php namespace PHPAssists\Shared\Core\ThirdParty\Stripe;
/**
 * PHPAssists Stripe API
 *
 * This class defines the possible Stripe API algo for the PHPAssists Stripe API.
 *
 * @link       https://hexome.com.ar
 * @since      0.0.5
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Core\ThirdParty\Stripe
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 */

class StripeChecker {
    private $stripeAvailable;
    public function __construct() { $this->stripeAvailable = class_exists('\Stripe\Stripe'); }
    public function check() : bool {
        return $this->stripeAvailable ? true : false;
    }
}
