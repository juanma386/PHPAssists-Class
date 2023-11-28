<?php
namespace PHPAssists\Shared\Entities; 

use PHPAssists\Shared\Core\ClassInvocationProcessor;

class Card extends ClassInvocationProcessor {
    private $id = null;
    private $card_type = null;
    private $last_4_digits_card = null;

    protected $table              = 'cards'; 
    protected $primaryKey         = 'card_id';
    protected $useAutoIncrement   = false;
    protected $allowedFields      = ['card_type', 'last_4_digits_card'];
  
    public function __construct($id, $card_type, $last_4_digits_card) {
        $this->setId($id);
        $this->setCardType($card_type);
        $this->setLast4DigitsCard($last_4_digits_card);
    }

    public function getId() : string | null {
        return $this->id;
    }

    public function getCardType() : string | null {
        return $this->card_type;
    }

    public function getLast4DigitsCard() : string | null {
        return $this->last_4_digits_card;
    }
    
    public function setId($id) : void {
        $this->id = isset($id) && !empty($id) ? $id : null;
    }

    public function setCardType($card_type) : void {
        $this->card_type = isset($card_type) && !empty($card_type) && is_string($card_type) && trim($card_type) !== '' ? $card_type : null;
    }
    

    public function setLast4DigitsCard($last_4_digits_card) : void {
        $this->last_4_digits_card = isset($last_4_digits_card) && !empty($last_4_digits_card) ? $last_4_digits_card : null;
    }

    public function validateLast4DigitsCard() : bool {
        return isset($this->last_4_digits_card) && !empty($this->last_4_digits_card) && preg_match('/^\d{4}$/', $this->last_4_digits_card);
    }
    
}
?>
