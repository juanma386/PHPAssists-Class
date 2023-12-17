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
 * Class: StripeAPI
 *
 * Description: This class defines the functions to interact with the Stripe API in a PHP project.
 * Constructor: Takes an optional Stripe API key as a parameter.
 * Methods:
 * setApiKey: Sets the Stripe API key.
 * createCustomer: Creates a new customer in Stripe.
 * createPrice: Creates a new price for a product in Stripe.
 * createProduct: Creates a new product in Stripe.
 * createPaymentIntent: Creates a new payment in Stripe.
 * searchPaymentIntent: Searches for an existing payment in Stripe by query.
 * getPendingPayments: Gets all pending payments from Stripe.
 * createCheckoutSession: Creates a new checkout session in Stripe.
 * createRecurringPayment: Creates a new recurring payment in Stripe.
 * updateRecurringPayment: Updates an existing recurring payment in Stripe.
 * cancelRecurringPayment: Cancels an existing recurring payment in Stripe.
 * listSubscriptions: Gets a list of all subscriptions for a customer in Stripe.
 * updateSubscription: Updates an existing subscription with a new plan in Stripe.
 * cancelSubscription: Cancels an existing subscription in Stripe.
 * listRefunds: Gets a list of all refunds issued in Stripe.
 * createRefund: Creates a new refund for a payment in Stripe.
 * listCoupons: Gets a list of all coupons in Stripe.
 * createCoupon: Creates a new coupon in Stripe.
 * generateTransactionReport: Generates a report of all transactions within a date range in Stripe.
 * generateCustomerReport: Generates a report of all customers created within a date range in Stripe.
 * setShipping: Sets the shipping information for a payment in Stripe.
 * getShipping: Gets the shipping information for a payment in Stripe.
 * generateInvoice: Generates an invoice for a payment in Stripe.
 * sendInvoice: Sends an invoice to a customer in Stripe.
 * getInvoice: Gets an existing invoice in Stripe.
 * createInvoiceItem: Creates an invoice item for a customer, price, and invoice in Stripe.
 * getInvoiceItem: Gets an existing invoice item in Stripe.
 * getAllInvoiceItems: Gets a list of all invoice items in Stripe.
 * getAllDisputes: Gets a list of all disputes in Stripe.
 * updDispute: Updates an existing dispute with new evidence, metadata, and optionally submits it in Stripe.
 * getDispute: Gets a specific dispute by ID in Stripe.
 * delDispute: Closes an existing dispute in Stripe.
 * getAllEvents: Gets a list of all events in Stripe.
 * getIdEvent: Gets a specific event by ID in Stripe.
 * createPaymentLink: Creates a new payment link for a price in Stripe.
 * updatePaymentLink: Updates an existing payment link with an order ID in Stripe.
 * getAllPaymentLinks: Gets a list of all payment links in Stripe.
 * Additional comments:
 * This PHP file contains the StripeAPI class, offering a set of methods to interact with
 * the Stripe API in PHP projects. It enables operations such as creating customers,
 * payments, subscription management, generating financial reports,
 * handling disputes, and billing within the Stripe platform.
 * 
 * Purpose and Usage: It aims to streamline integration with the Stripe API
 * in PHP applications, providing encapsulated functionalities for financial
 * operations. It's beneficial for developers seeking a structured and
 * simplified approach to managing transactions and financial
 * aspects within their applications.
 * 
 * Structure: The class is organized with methods dedicated
 * to specific tasks, ranging from customer creation to
 * handling events and payment links. Each method is
 * extensively documented, aiding comprehension and
 * usage by other developers.
 * 
 * Comprehensive Documentation: Detailed comments in each
 * method describe its purpose, parameters, and
 * expected return type, providing acomprehensive guide
 * for utilization.
 * 
 * Class Utilization: Developers can instantiate this class
 * and utilize its methods to perform various
 * operations related to payments, subscriptions,
 * billing, and other financial aspects within
 * applications using Stripe as a payment gateway.
 *
 */
 
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

class StripeAPI {
    /**
     * The Stripe API key.
     */
    private ?string $stripeApiKey;

    /**
     * Instance of the Stripe Client.
     */
    private $stripe;

    /**
     * QueryMetadata instance for constructing queries.
     */
    private QueryMetadata $query;



    /**
     * StripeAPI constructor.
     *
     * Initializes the StripeAPI class with a Stripe API key.
     *
     * @param string|null $stripeApiKey The Stripe API key.
     *
     * @return void
     */
    public function __construct(?string $stripeApiKey) {
        $this->setApiKey((string) $stripeApiKey);
    }

    /**
     * Sets the Stripe API key.
     *
     * @param string|null $stripeApiKey The Stripe API key.
     *
     * @return void
     */
    public function setApiKey(?string $stripeApiKey) : void {
        $this->stripeApiKey = $stripeApiKey;
        $this->query = new QueryMetadata();
        $this->stripe = new \Stripe\StripeClient(
            [
                "api_key" => $this->stripeApiKey,
                "stripe_version" => "2023-10-16"
            ]
        );
    }

    /**
     * Creates a customer.
     *
     * @param string $email The customer's email address.
     *
     * @return mixed The created customer object.
     */
    public function createCustomer($email) {
        return $this->stripe->customers->create([
            'email' => $email,
        ]);
    }

    /**
     * Creates a new price for a product in Stripe.
     *
     * @param int $amount The amount of the price.
     * @param string $currency The currency of the price.
     * @param string $productId The ID of the product.
     *
     * @return mixed The created price object.
     */

    public function createPrice( int $amount, string $currency, string $name, string $interval = "month" ) {
        return $this->stripe->prices->create([
            'currency' => $currency,
            'unit_amount' => $amount,
            'recurring' => ['interval' => $interval ],
            'product_data' => ['name' => $name],
        ]);
    }

    /**
     * Creates a new product in Stripe.
     *
     * @param string $name The name of the product.
     *
     * @return mixed The created product object.
     */
    public function createProduct($name) {
        return $this->stripe->products->create([
            'name' => $name,
        ]);
    }

    /**
     * Creates a new payment intent in Stripe.
     *
     * @param int|null $amount The amount of the payment.
     * @param string|null $currency The currency of the payment.
     * @param bool $automatic_payment Indicates if automatic payment methods are enabled.
     *
     * @return mixed The created payment intent object.
     */

    public function createPaymentIntent(?int $amount, ?string $currency, bool $automatic_payment = false) {
        return $this->stripe->paymentIntents->create([
            'amount' => $amount,
            'currency' => $currency,
            'automatic_payment_methods' => ['enabled' => $automatic_payment],
        ]);
    }

    /**
     * Searches for an existing payment in Stripe by query.
     *
     * @param array|null $query The parameters to filter the search.
     *
     * @return mixed The result of the search for payment intents.
     */
    public function searchPaymentIntent(?array $query) {
        $query = $this->query->buildSearchQuery($query);
        return $this->stripe->paymentIntents->search(['query' => $query]);
    }

    /**
     * Gets all pending payments from Stripe.
     *
     * @return mixed All pending payment intents from Stripe.
     */
    public function getPendingPayments() {
        return $this->stripe->paymentIntents->all(['status' => 'requires_payment_method']);
    }

    /**
     * Creates a new checkout session in Stripe.
     *
     * @param string|null $prod_id       The ID of the product.
     * @param string|null $customerId    The ID of the customer.
     * @param float|null  $amount        The payment amount.
     * @param string|null $currency      The currency code.
     * @param string|null $successUrl    The URL to redirect on successful payment.
     * @param string|null $cancelUrl     The URL to redirect on payment cancellation.
     * @param int         $hours         The duration in hours.
     *
     * @return mixed The created checkout session object.
     */
    public function createCheckoutSession(
        ?string $prod_id,
        ?string $customerId,
        ?float $amount,
        ?string $currency,
        ?string $successUrl,
        ?string $cancelUrl,
        ?int $hours = 2
    ): mixed {
        $paymentIntentBuilder = new PaymentIntentBuilder(
            $customerId,
            $currency,
            $amount,
            $prod_id,
            $successUrl,
            $cancelUrl,
            $hours
        );

        if ($paymentIntentBuilder->isReady()) {
            $payLoad = $paymentIntentBuilder->buildPaymentIntentData();
            return $this->stripe->checkout->sessions->create($payLoad);
        }

        return null;
    }

    


    // Recurring pay
    /**
     * Creates a new recurring payment in Stripe.
     *
     * @param string $customerId The ID of the customer.
     * @param int $amount The amount of the payment.
     * @param string $currency The currency of the payment.
     * @param string $interval The interval of the payment.
     * @param string $planId The ID of the plan.
     *
     * @return mixed The created recurring payment object.
     */
    public function createRecurringPayment($customerId, $amount, $currency, $interval, $planId) {
        return $this->stripe->paymentIntents->create([
            'customer' => $customerId,
            'amount' => $amount,
            'currency' => $currency,
            'interval' => $interval,
            'plan' => $planId,
        ]);
    }
    /**
     * Updates an existing recurring payment in Stripe.
     *
     * @param string $paymentIntentId The ID of the payment intent.
     * @param int $amount The updated amount of the payment.
     * @param string $currency The updated currency of the payment.
     * @param string $interval The updated interval of the payment.
     * @param string $planId The updated ID of the plan.
     *
     * @return mixed The updated recurring payment object.
     */    
    public function updateRecurringPayment($paymentIntentId, $amount, $currency, $interval, $planId) {
        return $this->stripe->paymentIntents->update($paymentIntentId, [
            'amount' => $amount,
            'currency' => $currency,
            'interval' => $interval,
            'plan' => $planId,
        ]);
    }
    
    /**
     * Cancels an existing recurring payment in Stripe.
     *
     * @param string $paymentIntentId The ID of the payment intent to cancel.
     *
     * @return mixed The canceled payment intent object.
     */
    public function cancelRecurringPayment(string $paymentIntentId) {
        return $this->stripe->paymentIntents->cancel($paymentIntentId);
    }

    

    // manage suscriptions

    /**
     * Retrieves a list of subscriptions for a customer in Stripe.
     *
     * @param string $customerId The ID of the customer.
     *
     * @return mixed All subscriptions associated with the specified customer.
     */
    public function listSubscriptions(string $customerId) {
        return $this->stripe->subscriptions->all(['customer' => $customerId]);
    }

    /**
     * Updates an existing subscription with a new plan in Stripe.
     *
     * @param string $subscriptionId The ID of the subscription to update.
     * @param string $planId The ID of the new plan to assign.
     *
     * @return mixed The updated subscription object.
     */
    public function updateSubscription(string $subscriptionId, string $planId) {
        return $this->stripe->subscriptions->update($subscriptionId, [
            'plan' => $planId,
        ]);
    }

    /**
     * Cancels an existing subscription in Stripe.
     *
     * @param string $subscriptionId The ID of the subscription to cancel.
     *
     * @return mixed The canceled subscription object.
     */
    public function cancelSubscription(string $subscriptionId) {
        return $this->stripe->subscriptions->cancel($subscriptionId);
    }

    

    // refund functions
    /**
     * Gets a list of all refunds issued in Stripe.
     *
     * @return mixed All refund objects.
     */
    public function listRefunds() {
        return $this->stripe->refunds->all();
    }
    
    /**
     * Creates a new refund for a payment in Stripe.
     *
     * @param string $paymentIntentId The ID of the payment intent for which the refund is created.
     *
     * @return mixed The created refund object in Stripe.
     */
    public function createRefund(string $paymentIntentId) {
        return $this->stripe->refunds->create([
            'payment_intent' => $paymentIntentId,
        ]);
    }


    // coupons functions
    /**
     * Gets a list of all coupons in Stripe.
     *
     * @return mixed All coupon objects.
     */
    public function listCoupons() {
        return $this->stripe->coupons->all();
    }
    
    /**
     * Creates a new coupon in Stripe.
     *
     * @param string|null $name            The name of the coupon.
     * @param float|null  $amountOff       The amount or percentage off provided by the coupon.
     * @param string|null $currency        The currency of the coupon.
     * @param int|null    $duration        The duration of the coupon in months.
     *                                     If greater than zero, coupon will have a 'repeating' duration; otherwise, 'once'.
     *
     * @return mixed The created coupon object in Stripe.
     */
    public function createCoupon(?string $name, ?float $amountOff, ?string $currency, ?int $duration) {
        return $this->stripe->coupons->create([
            'name' => $name,
            'percent_off' => $amountOff,
            'currency' => $currency,
            'duration' => ($duration > 0) ? 'repeating' : 'once',
            'duration_in_months' => $duration,
        ]);
    }


    // manage reports
    /**
     * Generates a report of all transactions within a date range in Stripe.
     *
     * @param string $startDate The start date of the report.
     * @param string $endDate The end date of the report.
     *
     * @return mixed All transaction objects within the specified date range.
     */
    public function generateTransactionReport($startDate, $endDate) {
        return $this->stripe->paymentIntents->all(['created' => ['gte' => $startDate, 'lte' => $endDate]]);
    }
    /**
     * Generates a report of customers created within a specified date range in Stripe.
     *
     * @param string $startDate The start date for the report in 'YYYY-MM-DD' format.
     * @param string $endDate   The end date for the report in 'YYYY-MM-DD' format.
     *
     * @return mixed A list of customer objects created within the specified date range.
     */
    public function generateCustomerReport($startDate, $endDate) {
        return $this->stripe->customer->all(['created' => ['gte' => $startDate, 'lte' => $endDate]]);
    }


    // Shipping

    /**
     * Sets shipping information for a payment intent in Stripe.
     *
     * @param string $paymentIntentId The ID of the payment intent.
     * @param array  $shippingAddress An array containing shipping address details.
     * @param string $shippingRate    The shipping rate.
     *
     * @return mixed The updated payment intent object with shipping information.
     */
    public function setShipping($paymentIntentId, $shippingAddress, $shippingRate) {
        return $this->stripe->paymentIntents->update($paymentIntentId, [
            'shipping' => [
                'address' => $shippingAddress,
                'rate' => $shippingRate,
            ],
        ]);
    }

    /**
     * Retrieves shipping information for a payment intent from Stripe.
     *
     * @param string $paymentIntentId The ID of the payment intent.
     *
     * @return mixed Shipping information associated with the payment intent.
     */
    public function getShipping($paymentIntentId) {
        return $this->stripe->paymentIntents->retrieve($paymentIntentId)->shipping;
    }


    // invoice
    /**
     * Generates an invoice for a payment in Stripe.
     *
     * @param string $paymentIntentId The ID of the payment intent.
     * @param array $invoiceData Additional invoice data.
     * @param string|null $customerId The ID of the customer (optional).
     *
     * @return mixed The generated invoice object.
     *
     * @throws InvalidArgumentException If Payment Intent ID is empty.
     */
    public function generateInvoice($paymentIntentId, array $invoiceData = [], ?string $customerId) {
        if (empty($paymentIntentId)) {
            throw new InvalidArgumentException('Payment Intent ID is required.');
        }

        $data['payment_intent'] = $paymentIntentId;

        if (isset($customerId) && !empty($customerId)) {
            $data['customer'] = $customerId;
        }

        $data['data'] = $invoiceData;
        
        return $this->stripe->invoices->create($data);
    }
    
    /**
     * Sends an invoice to a customer in Stripe.
     *
     * @param string      $invoiceId        The ID of the invoice to send.
     * @param string|null $collectionMethod Optional. Specifies the collection method for the invoice. Defaults to 'charge_automatically'.
     *                                      Valid values are 'charge_automatically' or 'send_invoice'.
     *
     * @return mixed The updated invoice object after sending.
     *
     * @throws InvalidArgumentException If an invalid collection method is provided.
     */
    public function sendInvoice($invoiceId, $collectionMethod = 'charge_automatically') {
        if ($collectionMethod !== 'charge_automatically' && $collectionMethod !== 'send_invoice') {
            throw new InvalidArgumentException('Invalid collection method. Valid values are "charge_automatically" or "send_invoice".');
        }
        return $this->stripe->invoices->update($invoiceId, [
            'status' => 'sent',
            'collection_method' => $collectionMethod,
        ]);
    }

    /**
     * Retrieves an existing invoice from Stripe.
     *
     * @param string $invoiceId The ID of the invoice to retrieve.
     *
     * @return mixed The retrieved invoice object.
     */
    public function getInvoice(?string $invoiceId) {
        return $this->stripe->invoiceItems->retrieve($invoiceId, []);
    }


    // invoice item 
    
    /**
     * Creates an invoice item.
     *
     * @param string|null $customerId The ID of the customer.
     * @param string|null $priceId The ID of the price.
     * @param string|null $invoiceId The ID of the invoice.
     *
     * @return mixed The created invoice item object.
     * 
     * @throws InvalidArgumentException If required parameters are empty.
     */
    public function createInvoiceItem(?string $customerId, ?string $priceId, ?string $invoiceId) {
        // Validate the parameters
        if (empty($customerId) || empty($priceId) || empty($invoiceId)) {
            throw new InvalidArgumentException('Customer ID, Price ID, and Invoice ID are required.');
        }

        // Create an Invoice Item with the Price, and Customer you want to charge
        return $this->stripe->invoiceItems->create([
            'customer' => $customerId,
            'price' => $priceId,
            'invoice' => $invoiceId
        ]);
    }

    /**
     * Retrieves a specific invoice item from Stripe.
     *
     * @param string|null $invoiceIdItem The ID of the invoice item to retrieve.
     *
     * @return mixed The retrieved invoice item object.
     */
    public function getInvoiceItem($invoiceIdItem) {
        return $this->stripe->invoiceItems->retrieve($invoiceIdItem, []);
    }

    /**
     * Retrieves a list of all invoice items from Stripe based on the specified limit.
     *
     * @param int|null $limit The maximum number of invoice items to retrieve. Defaults to 10.
     *
     * @return mixed All invoice item objects based on the specified limit.
     */
    public function getAllInvoiceItems(?int $limit = 10) {
        return $this->stripe->invoiceItems->all(['limit' => $limit]);
    }



    // Disputes

    /**
     * Gets all disputes.
     *
     * @param int|null $limit The maximum number of disputes to retrieve.
     *
     * @return mixed All dispute objects based on the specified limit.
     */
    public function getAllDisputes( ? int $limit = 3 ) {
        return $this->stripe->disputes->all(['limit' => $limit]);    
    } 

    /**
     * Updates a specific dispute with new evidence, metadata, and optionally submits it.
     *
     * @param string|null $disputeId The ID of the dispute to update.
     * @param array       $evidence   Evidence related to the dispute.
     * @param array       $metadata   Additional metadata for the dispute.
     * @param bool        $submit     Optional. Indicates if the dispute should be submitted after updating. Defaults to false.
     *
     * @return mixed The updated dispute object.
     */
    public function updDispute(
        ?string $disputeId,
        array $evidence = [],
        array $metadata = [],
        bool $submit = false
    ) {
        return $this->stripe->disputes->update($disputeId, [
            'evidence' => $evidence,
            'metadata' => $metadata,
            'submit' => $submit,
        ]);
    }


    /**
     * Gets a specific dispute by ID.
     *
     * @param string|null $disputeId The ID of the dispute.
     *
     * @return mixed The dispute object with the specified ID.
     */

    public function getDispute( ?string $disputeId ) {
        return $this->stripe->disputes->retrieve($disputeId, []);
    }
    
    /**
     * Del a specific dispute by ID.
     *
     * @param string|null $disputeId The ID of the dispute.
     *
     * @return mixed The dispute object with the specified ID.
     */
    public function delDispute( ?string $disputeId ) {
        return $this->stripe->disputes->close($disputeId, []);
    }

    // events 
    /**
     * Gets a list of all events in Stripe.
     *
     * @param int|null $limit The maximum number of events to retrieve.
     *
     * @return mixed All event objects based on the specified limit.
     */
    public function getAllEvents( ? int $limit = 10 ) {
        return $this->stripe->events->all(['limit' => $limit]);    
    } 

    /**
     * Gets a specific event by ID.
     *
     * @param int|null $event_id The ID of the event.
     *
     * @return mixed The event object with the specified ID.
     */
    public function getIdEvent( ? int $event_id ) {
        return $this->stripe->events->retrieve($event_id, []);
    } 

    // Payment Links

    /**
     * Creates a payment link.
     *
     * @param string|null $priceId The ID of the price.
     *
     * @return mixed The created payment link object.
     */
    public function createPaymentLink(?string $priceId ) {
        return $this->stripe->paymentLinks->create([
        'line_items' => [
                [
                'price' => $priceId,
                'quantity' => 1,
                ],
            ],
        ]);
    }

    /**
     * Updates a payment link.
     *
     * @param string|null $linkId The ID of the payment link.
     * @param string|null $orderId The ID of the order.
     *
     * @return mixed The updated payment link object.
     */
    public function updatePaymentLink(?string $linkId, ?string $orderId ) {
        return $this->stripe->paymentLinks->update(
            $linkId,
            [ 'metadata' => ['order_id' => $orderId ] ]
        );
    }
    
    /**
     * Retrieves all payment links.
     *
     * @param int|null $limit The maximum number of payment links to retrieve.
     *
     * @return mixed All payment link objects based on the specified limit.
     */
    public function getAllPaymentLinks(?int $limit = 3) {
        return $this->stripe->paymentLinks->all(['limit' => $limit ]);
    }

    // ...
}
