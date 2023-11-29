<?php
/**
 * PHPAssists Expense API Test
 *
 * This class defines the possible Functions for the PHPAssists Expense API Test.
 *
 * @link       https://hexome.com.ar
 * @since      1.0.0
 *
 * @package    PHPAssistsTest
 * @subpackage PHPAssistsTest\Shared\Entities
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 */
namespace PHPAssistsTest\Shared\Entities;

use PHPUnit\Framework\TestCase;
use PHPAssists\Shared\Entities\Expense;

class ExpenseTest extends TestCase
{
    private $expense_id = '1';
    private $category_id = '2';
    private $description = 'Test expense';
    private $amount = 100.00;
    private $expense_date = '2023-11-30';

    public function testGetters()
    {
        $expense = new Expense(
            $this->expense_id,
            $this->category_id,
            $this->description,
            $this->amount,
            $this->expense_date
        );

        $this->assertEquals($this->expense_id, $expense->getId());
        $this->assertEquals($this->category_id, $expense->getCategoryId());
        $this->assertEquals($this->description, $expense->getDescription());
        $this->assertEquals($this->amount, $expense->getAmount());
        $this->assertEquals($this->expense_date, $expense->getExpenseDate());
    }

    public function testSetCategoryId()
    {
        $expense = new Expense(
            $this->expense_id,
            $this->category_id,
            $this->description,
            $this->amount,
            $this->expense_date
        );

        $expense->setCategoryId('3');
        $this->assertEquals('3', $expense->getCategoryId());

        $expense->setCategoryId(null);
        $this->assertNull($expense->getCategoryId());
    }

    public function testSetDescription()
    {
        $expense = new Expense(
            $this->expense_id,
            $this->category_id,
            $this->description,
            $this->amount,
            $this->expense_date
        );

        $expense->setDescription('New description');
        $this->assertEquals('New description', $expense->getDescription());

        $expense->setDescription(null);
        $this->assertNull($expense->getDescription());
    }

    public function testSetAmount()
    {
        $expense = new Expense(
            $this->expense_id,
            $this->category_id,
            $this->description,
            $this->amount,
            $this->expense_date
        );

        $expense->setAmount(200.00);
        $this->assertEquals(200.00, $expense->getAmount());

        $expense->setAmount(null);
        $this->assertNull($expense->getAmount());
    }

    public function testSetExpenseDate()
    {
        $expense = new Expense(
            $this->expense_id,
            $this->category_id,
            $this->description,
            $this->amount,
            $this->expense_date
        );

        $newDate = '2023-12-01';
        $expense->setExpenseDate($newDate);
        $this->assertEquals($newDate, $expense->getExpenseDate());

        $expense->setExpenseDate(null);
        $this->assertNull($expense->getExpenseDate());
    }
}
