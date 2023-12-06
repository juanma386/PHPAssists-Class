<?php
/**
 * PHPAssists Card API Test
 *
 * This class defines the possible Functions for the PHPAssists Card API Test.
 *
 * @link       https://hexome.com.ar
 * @since      0.0.1
 *
 * @package    PHPAssistsTest
 * @subpackage PHPAssistsTest\Shared\Entities
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 */
namespace PHPAssistsTest\Shared\Entities;

use PHPUnit\Framework\TestCase;
use PHPAssists\Shared\Entities\Card;

class CardTest extends TestCase
{
    private string  $card_id            = '1';
    private string  $card_type          = 'Visa';
    private int     $last_4_digits_card = 1234;

    public function testGetters()
    {
        $card = new Card($this->card_id, $this->card_type, $this->last_4_digits_card);

        // Pruebas para los getters con los valores establecidos
        $this->assertEquals($this->card_id, $card->getId());
        $this->assertEquals($this->card_type, $card->getCardType());
        $this->assertEquals($this->last_4_digits_card, $card->getLast4DigitsCard());
    }

    public function testSetCardType()
    {
        $card = new Card($this->card_id, $this->card_type, $this->last_4_digits_card);

        // Prueba para setCardType() con un valor válido
        $card->setCardType('Mastercard');
        $this->assertEquals('Mastercard', $card->getCardType());

        // Prueba para setCardType() con un valor inválido (null)
        $card->setCardType(null);
        $this->assertNull($card->getCardType());
    }

    public function testSetLast4DigitsCard()
    {
        $card = new Card($this->card_id, $this->card_type, $this->last_4_digits_card);

        // Prueba para setLast4DigitsCard() con un valor válido
        $card->setLast4DigitsCard(5678);
        $this->assertEquals(5678, $card->getLast4DigitsCard());

        // Prueba para setLast4DigitsCard() con un valor inválido (cadena vacía)
        $card->setLast4DigitsCard(null);
        $this->assertNull($card->getLast4DigitsCard());
    }

    public function testValidateLast4DigitsCard()
    {
        $card = new Card($this->card_id, $this->card_type, $this->last_4_digits_card);

        // Prueba para validateLast4DigitsCard() con un valor válido
        $this->assertTrue($card->validateLast4DigitsCard());

        // Prueba para validateLast4DigitsCard() con un valor inválido
        $card->setLast4DigitsCard(123); // Establece un valor inválido de 3 dígitos
        $this->assertFalse($card->validateLast4DigitsCard());
    }
}
?>
