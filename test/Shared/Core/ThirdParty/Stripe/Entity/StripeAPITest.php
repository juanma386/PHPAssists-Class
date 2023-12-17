<?php
namespace PHPAssistsTest\Shared\Core\ThirdParty\Stripe\Entity;
/**
 * PHPAssists Stripe API Test
 *
 * This class defines the possible Functions for the PHPAssists Stripe API Test.
 *
 * @link       https://hexome.com.ar
 * @link       https://hexome.cloud
 * @link       https://hexome.es
 * @since      0.0.5
 *
 * @package    PHPAssistsTest
 * @subpackage PHPAssistsTest\Shared\Core\ThirdParty\Stripe\Entity
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 * @link https://packagist.org/packages/juanma386/php-assists-class
 *
 */

use PHPUnit\Framework\TestCase;
use PHPAssists\Shared\Core\ThirdParty\Stripe\Entity\StripeAPI;
use Faker\Factory as FakerFactory;
use Stripe\Stripe;
use Stripe\Product;
use Stripe\Price;
use Stripe\Customer;
use Stripe\PaymentIntent;
use Stripe\Subscription;
use Stripe\Coupon;
use Stripe\Refund;
use Stripe\Invoice;
use Stripe\InvoiceItem;
use Stripe\Dispute;
use Stripe\Event;
use Stripe\PaymentLink;
use InvalidArgumentException;

class StripeAPITest extends TestCase
{
    protected StripeAPI $stripeAPI;
    protected $faker;
    protected $price;
    protected $testKey = "sk_test_CGGvfNiIPwLXiDwaOfZ3oX6Y";
    const TEST_RESOURCE_ID = 'prod_123';


    protected function setUp(): void
    {
        $this->stripeAPI = new StripeAPI($this->testKey);
        $this->faker = FakerFactory::create();
    }

    public function testCreateProduct(): void
    {
        // Generate a random word as the product name
        $productName = $this->faker->word;
    
        // Create the product
        $product = $this->stripeAPI->createProduct($productName);
    
        // Assertions
        $this->assertNotNull($product);
        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals($productName, $product->name);
    }
    
    public function testCreateCustomer(): void
    {
        // Generate a random email address
        $email = $this->faker->email;
    
        // Create the customer
        $customer = $this->stripeAPI->createCustomer($email);
    
        // Assertions
        $this->assertNotNull($customer);
        $this->assertInstanceOf('Stripe\Customer', $customer);
        $this->assertEquals($email, $customer->email);
    }
    
    public function testCreateCustomerR(): void
    {
        // Generate a random email address
        $email = $this->faker->email;
    
        // Create the customer
        $customer = $this->stripeAPI->createCustomer($email);

        // Assertions
        $this->assertNotNull($customer);
        $this->assertInstanceOf('Stripe\Customer', $customer);
    }

    public function testCreatePriceA(): void
    {

        // Generate a random word as the product name
        $productName = $this->faker->word;
        $amount = 1000;
        // Create the product
        $product = $this->stripeAPI->createProduct($productName);
        // Assuming you are creating a price
        $currency = "usd";
        $price = $this->stripeAPI->createPrice($amount, $currency, $productName, "month" );
        // Assertions
        $this->assertNotNull($price);
        $this->assertInstanceOf('Stripe\Price', $price);// Verify that the price is an instance of Stripe\Price
        $this->assertEquals($currency, $price->currency);
    }
    
    public function testCreatePrice(): void
    {
        $productName = $this->faker->word; // Generate a random word as the product name

        $product = $this->stripeAPI->createProduct($productName);

        // Assertions
        $this->assertNotNull($product);
        $this->assertEquals($productName, $product->name);

        $amount = $this->faker->randomNumber(4); // Generate a random amount
        $currency = "usd"; 
        $productId = $product->id;

        $price = $this->stripeAPI->createPrice($amount, $currency, $productId);
        
        $this->assertNotNull($price);
        $this->assertInstanceOf('Stripe\Price', $price);

    }
    

    public function testPaymentIntent(): void {
        
        $amount = 2000; $currency = "usd";
        $paymentIntent = $this->stripeAPI->createPaymentIntent($amount, $currency, true);
        $this->assertInstanceOf('Stripe\PaymentIntent', $paymentIntent);

        // Assertions
        $this->assertNotNull($paymentIntent);
        $this->assertEquals( "requires_payment_method", $paymentIntent->status);
    }
    
}
