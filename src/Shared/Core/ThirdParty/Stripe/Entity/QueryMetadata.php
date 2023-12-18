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
 * @subpackage PHPAssists\Shared\Core\ThirdParty\Stripe\Entity
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 * @link https://packagist.org/packages/juanma386/php-assists-class
 *
 */

class QueryMetadata {
    public ?string $query;
    public ?string $metadataKey;
    public ?string $metadataValue;
    // Check last number card credit|| debit || card other
    public ?string $last;
    // customer
    private ?string $email;


    private function setMetadataKey($metadataKey) {
        $this->metadataKey = $metadataKey;
    }

    private function setMetadataValue($metadataValue) {
        $this->metadataValue = $metadataValue;
    }

    private function isValidMetadata(): bool {
        return $this->metadataKey !== null && $this->metadataValue !== null;
    }
    
    public function generateQueryStringMetadata(?string $metadataValue,?string $metadataKey) : ? string {
        return (
            [
                $this->setMetadataValue($metadataValue),
                $this->setMetadataKey($metadataKey),
                $this->setQueryStringMetadata(),
            ] 
        ) ? $this->returnQueryStringMetadata() : null;
    }
    
    private function setQueryStringMetadata() : void {
        $this->query = "metadata['" . $this->metadataKey . "']: '" . $this->metadataValue . "'";
    }

    private function getQueryStringMetadata(): ?string {
        return $this->query;
    }

    private function returnQueryStringMetadata() : ? string {
        if ($this->isValidMetadata()) {
            return $this->getQueryStringMetadata();
        } else {
            return null;
        }
    }

    // Last number credit card

    private function setLast(?int $last) : void {
        $this->last = $last;
    }

    private function getLast() :? int {
        return $this->last;
    }

    private function checkLength() : bool {
        return (
            [
                $a = strval($this->last),
                $b = strlen($a),
            ] AND $b===4
        ) ? true : false;
    }

    public function getLastNumber(?int $last) : ? string {
        return (
            [
                $this->setLast($last),        
            ] AND $this->checkLength()
        ) ? "payment_method_details.card.last4:". $this->getLast() : null;
    }

    // customer search

    private function setEmail(?string $email) : void {
        $this->email = $email;
    }

    private function getEmail() :? string {
        return $this->email;
    }

    public function getEmailCustommer(?string $email) : ? string {
        return (
            [
                $this->setEmail($email),        
            ] AND $this->validEmail()
        ) ? 'email:\'' . $this->getEmail() .  '\''  : null;
    }

    private function validEmail() {
            return is_string($this->email) && !empty($this->email) && filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }

    public function buildSearchQuery(array $fields = []): string {
        $query = '';
    
        foreach ($fields as $field => $value) {
            // Si el valor es un array, conviértelo en una cadena separada por comas
            if (is_array($value)) {
                $value = implode(',', $value);
            }
    
            // Escapar comillas dentro de las comillas
            $value = str_replace('"', '\"', $value);
    
            // Construir la parte de la consulta para cada campo y valor
            if ($query !== '') {
                $query .= ' AND ';
            }
    
            $query .= $field . ':"' . $value . '"';
        }
    
        return $query;
    }
    
}