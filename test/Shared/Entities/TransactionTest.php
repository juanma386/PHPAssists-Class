<?php
namespace PHPAssistsTest\Shared\Entities;

use PHPUnit\Framework\TestCase;
use PHPAssists\Shared\Entities\Transaction;

class TransactionTest extends TestCase
{
    private $transaction_id = '1';
    private $transaction_type = 'transfer';
    private $origin_id = '123';
    private $destination_id = '456';
    private $amount = 100.00;
    private $transaction_date = '2023-11-29';
    private $description = 'Test transaction';

    public function testGetters()
    {
        $transaction = new Transaction(
            $this->transaction_id,
            $this->transaction_type,
            $this->origin_id,
            $this->destination_id,
            $this->amount,
            $this->transaction_date,
            $this->description
        );

        // Pruebas para los getters con los valores establecidos
        $this->assertEquals($this->transaction_id, $transaction->getId());
        $this->assertEquals($this->transaction_type, $transaction->getTransactionType());
        $this->assertEquals($this->origin_id, $transaction->getOriginId());
        $this->assertEquals($this->destination_id, $transaction->getDestinationId());
        $this->assertEquals($this->amount, $transaction->getAmount());
        $this->assertEquals($this->transaction_date, $transaction->getTransactionDate());
        $this->assertEquals($this->description, $transaction->getDescription());
    }

    public function testSetTransactionType()
    {
        $transaction = new Transaction(
            $this->transaction_id,
            $this->transaction_type,
            $this->origin_id,
            $this->destination_id,
            $this->amount,
            $this->transaction_date,
            $this->description
        );

        // Prueba para setTransactionType() con un valor válido
        $transaction->setTransactionType('payment');
        $this->assertEquals('payment', $transaction->getTransactionType());

        // Prueba para setTransactionType() con un valor inválido (null)
        $transaction->setTransactionType(null);
        $this->assertNull($transaction->getTransactionType());
    }

    public function testSetAmount()
    {
        $transaction = new Transaction(
            $this->transaction_id,
            $this->transaction_type,
            $this->origin_id,
            $this->destination_id,
            $this->amount,
            $this->transaction_date,
            $this->description
        );

        // Prueba para setAmount() con un valor válido
        $transaction->setAmount(200.00);
        $this->assertEquals(200.00, $transaction->getAmount());

        // Prueba para setAmount() con un valor inválido (cero)
        $transaction->setAmount(0);
        $this->assertEquals(0, $transaction->getAmount());
    }

    public function testSetTransactionDate()
    {
        $transaction = new Transaction(
            $this->transaction_id,
            $this->transaction_type,
            $this->origin_id,
            $this->destination_id,
            $this->amount,
            $this->transaction_date,
            $this->description
        );

        // Prueba para setTransactionDate() con un valor válido
        $newDate = '2023-12-01';
        $transaction->setTransactionDate($newDate);
        $this->assertEquals($newDate, $transaction->getTransactionDate());

        // Prueba para setTransactionDate() con un valor inválido (cadena vacía)
        $transaction->setTransactionDate('');
        $this->assertNull($transaction->getTransactionDate());
    }

    public function testSetDescription()
    {
        $transaction = new Transaction(
            $this->transaction_id,
            $this->transaction_type,
            $this->origin_id,
            $this->destination_id,
            $this->amount,
            $this->transaction_date,
            $this->description
        );

        // Prueba para setDescription() con un valor válido
        $newDescription = 'New description';
        $transaction->setDescription($newDescription);
        $this->assertEquals($newDescription, $transaction->getDescription());

        // Prueba para setDescription() con un valor inválido (null)
        $transaction->setDescription(null);
        $this->assertNull($transaction->getDescription());
    }
}
?>
