<?php
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

