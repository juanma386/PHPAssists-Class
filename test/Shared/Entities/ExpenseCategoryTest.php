<?php
/**
 * PHPAssists ExpenseCategory API Test
 *
 * This class defines the possible Functions for the PHPAssists ExpenseCategory API Test.
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
use PHPAssists\Shared\Entities\ExpenseCategory;

class ExpenseCategoryTest extends TestCase
{
    private $category_id = '1';
    private $category_name = 'Utilities';

    public function testGetters()
    {
        $expenseCategory = new ExpenseCategory($this->category_id, $this->category_name);

        $this->assertEquals($this->category_id, $expenseCategory->getId());
        $this->assertEquals($this->category_name, $expenseCategory->getCategoryName());
    }

    public function testSetCategoryName()
    {
        $expenseCategory = new ExpenseCategory($this->category_id, $this->category_name);

        // Prueba para setCategoryName() con un valor válido
        $newCategoryName = 'Rent';
        $expenseCategory->setCategoryName($newCategoryName);
        $this->assertEquals($newCategoryName, $expenseCategory->getCategoryName());

        // Prueba para setCategoryName() con un valor inválido (null)
        $expenseCategory->setCategoryName(null);
        $this->assertNull($expenseCategory->getCategoryName());

        // Prueba para setCategoryName() con un valor inválido (cadena vacía)
        $expenseCategory->setCategoryName('');
        $this->assertNull($expenseCategory->getCategoryName());
    }
}
