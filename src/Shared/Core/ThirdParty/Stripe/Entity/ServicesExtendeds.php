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
class ServicesExtendeds {

    // marketing

    public function sendNewsletter($emailAddresses, $subject, $body) {
        return Newsletter::send([
            'email_addresses' => $emailAddresses,
            'subject' => $subject,
            'body' => $body,
        ]);
    }
    
    public function createAdCampaign($name, $budget, $target_audience) {
        return AdCampaign::create([
            'name' => $name,
            'budget' => $budget,
            'target_audience' => $target_audience,
        ]);
    }

    // ticket support

    public function createTicket($subject, $body) {
        return Ticket::create([
            'subject' => $subject,
            'body' => $body,
        ]);
    }
    
    public function respondTicket($ticketId, $response) {
        return Ticket::update($ticketId, [
            'response' => $response,
        ]);
    }

    // Inventary

    public function getInventory($productId) {
        return InventoryItem::where('product_id', $productId)->get();
    }
    
    public function updateInventory($productId, $quantity) {
        return InventoryItem::where('product_id', $productId)->update(['quantity' => $quantity]);
    }
    
    public function createInventoryItem($productId, $quantity) {
        return InventoryItem::create([
            'product_id' => $productId,
            'quantity' => $quantity,
        ]);
    }
    
    public function deleteInventoryItem($productId) {
        return InventoryItem::where('product_id', $productId)->delete();
    }

    // Orders

    public function getOrders() {
        return Order::all();
    }
    
    public function getOrder($orderId) {
        return Order::find($orderId);
    }
    
    public function createOrder($customerId, $items, $shippingAddress, $billingAddress) {
        return Order::create([
            'customer_id' => $customerId,
            'items' => $items,
            'shipping_address' => $shippingAddress,
            'billing_address' => $billingAddress,
        ]);
    }
    
    public function updateOrder($orderId, $data) {
        return Order::update($orderId, $data);
    }
    
    public function cancelOrder($orderId) {
        return Order::update($orderId, [
            'status' => 'cancelled',
        ]);
    }

    // Return

    public function getReturns() {
        return Return::all();
    }
    
    public function getReturn($returnId) {
        return Return::find($returnId);
    }
    
    public function createReturn($orderId, $items, $reason) {
        return Return::create([
            'order_id' => $orderId,
            'items' => $items,
            'reason' => $reason,
        ]);
    }
    
    public function updateReturn($returnId, $data) {
        return Return::update($returnId, $data);
    }
    
    public function processReturn($returnId) {
        return Return::update($returnId, [
            'status' => 'processed',
        ]);
    }    


    // taxes functions

    public function calculateTax($amount, $currency, $taxRate) {
        return $amount * $taxRate;
    }
    
    public function applyTax($amount, $currency, $taxRate) {
        return $amount + calculateTax($amount, $currency, $taxRate);
    }
    

    // Shipping
    
    public function calculateShipping($amount, $currency, $shippingRate) {
        return $amount + $shippingRate;
    }
    
}
