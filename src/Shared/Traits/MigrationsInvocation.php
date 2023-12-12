<?php
/**
 * PHPAssists Migrations API
 *
 * This class defines the possible Functions for the PHPAssists Migrations API.
 *
 * @link       https://hexome.com.ar
 * @since      0.0.1
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Traits
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 * @link https://packagist.org/packages/juanma386/php-assists-class
 *
 */
namespace PHPAssists\Shared\Traits;

trait MigrationsInvocation {
    
    protected $forge;

    public function __construct(Forge $forge) {
        isset($forge) || throw new Exception("Need Forge CI4 Class;");
        $this->forge = $forge;
    }

    public function createTableIfNotExists($tableName, $fields) {
        if (!$this->forge->table($tableName)->exists()) {
            foreach ($fields as $fieldName => $field) {
                $this->forge->addField($fieldName . ' ' . $field['type']);
                if (isset($field['constraint'])) {
                    $this->forge->addConstraint($field['constraint']);
                }
            }

            $this->forge->createTable($tableName, true);
        }
    }
}

