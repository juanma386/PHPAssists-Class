<?php namespace PHPAssists\Shared\Core\ThirdParty\Stripe\Entity;
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

class PaymentIntentBuilder {
    private string $customerId;
    private string $currency;
    private int $amount;
    private string $prodId;
    private string $successUrl;
    private string $cancelUrl;
    private int $hours;

    public function __construct(
        string $customerId,
        string $currency,
        int $amount,
        string $prodId,
        string $successUrl,
        string $cancelUrl,
        int $hours = 2
    ) {
        $this->customerId = $customerId;
        $this->currency = $currency;
        $this->amount = $amount;
        $this->prodId = $prodId;
        $this->successUrl = $successUrl;
        $this->cancelUrl = $cancelUrl;
        $this->hours = $hours;
    }

    public function buildPaymentIntentData(): array {
        return [
            'customer' => $this->customerId,
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => $this->currency,
                        'unit_amount' => $this->amount,
                        'product' => $this->prodId,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => $this->successUrl,
            'cancel_url' => $this->cancelUrl,
            'expires_at' => time() + (3600 * $this->hours), 
        ];
    }

    public function isReady(): bool {
            return (
                !empty($this->customerId) &&
                !empty($this->currency) &&
                $this->amount > 0 &&
                !empty($this->prodId) &&
                !empty($this->successUrl) &&
                !empty($this->cancelUrl)
            );
    }
    
}
