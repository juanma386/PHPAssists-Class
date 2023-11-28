<?php 
namespace PHPAssistsTest\Shared\Traits; 

use PHPUnit\Framework\TestCase;
use PHPAssists\Shared\Traits\MigrationsInvocation;
use CodeIgniter\Database\Forge;

class MigrationsInvocationTraitTest extends TestCase
{
  public function testCreateTableIfNotExists()
  {
    // Simulación de la clase Forge de CodeIgniter 4
    $forge = $this->getMockBuilder(Forge::class)
           ->disableOriginalConstructor()
           ->getMock();

    // Crear una clase ficticia que use el trait MigrationsInvocation
    $dummyClass = new class($forge) {
      use MigrationsInvocation;
    };

    // Definir el nombre de la tabla y los campos para la prueba
    $tableName = 'test_table';
    $fields = [
      'id' => ['type' => 'INT', 'constraint' => 'PRIMARY KEY'],
      'name' => ['type' => 'VARCHAR(100)'],
      // Agregar otros campos si es necesario
    ];

    // Simular el comportamiento de exists() para devolver false (tabla no existe)
    $forge->expects($this->once())
       ->method('table')
       ->with($tableName)
       ->willReturnSelf();

    $forge->expects($this->once())
       ->method('exists')
       ->willReturn(false);

    // Llamar al método createTableIfNotExists() del trait
    $dummyClass->createTableIfNotExists($tableName, $fields);

    // Verificar que se llamaron los métodos adecuados en Forge
    // Aquí puedes agregar más aserciones según tu lógica de negocio
    // Por ejemplo, podrías verificar si addField() y createTable() se llamaron con los parámetros esperados

    // Asegurar que la tabla se cree cuando no existe
    $this->assertTrue($forge->tableExists($tableName));
    foreach ($fields as $field) {
      $this->assertTrue($forge->fieldExists($tableName, $field['name']));
      $this->assertEquals($field['type'], $forge->fieldType($tableName, $field['name']));
    }
  }
}