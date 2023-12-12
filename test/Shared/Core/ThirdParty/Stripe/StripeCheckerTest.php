<?php
namespace PHPAssistsTest\Shared\Core\ThirdParty\Stripe;
/**
 * PHPAssists Stripe API Test
 *
 * This class defines the possible Functions for the PHPAssists Stripe API Test.
 *
 * @link       https://hexome.com.ar
 * @since      0.0.5
 *
 * @package    PHPAssistsTest
 * @subpackage PHPAssistsTest\Shared\Core\ThirdParty\Stripe
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 * @link https://packagist.org/packages/juanma386/php-assists-class
 *
 */

use PHPUnit\Framework\TestCase;
use PHPAssists\Shared\Core\ThirdParty\Stripe\StripeChecker;

class StripeCheckerTest extends TestCase
{
    private $stripe;

    protected function setUp(): void {
        parent::setUp();
        $this->stripe = new StripeChecker();
    }

    public function testClassExists() : void
    {
        $this->assertInstanceOf(StripeChecker::class, $this->stripe);
    }
    public function testCheckStripe() : void {
        $status = $this->stripe->check();
        $this->assertTrue($status);
    }
}
?>