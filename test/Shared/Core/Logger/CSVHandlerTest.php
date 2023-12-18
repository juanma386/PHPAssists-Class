<?php

/**
 * PHPAssists CSVHandlerTest API Test
 *
 * This PHPUnit class defines the possible Languages API codes for the PHPAssistsTest FileLogger API.
 *
 * @link       https://hexome.com.ar
 * @link       https://hexome.cloud
 * @link       https://hexome.es
 * @since      0.0.5
 *
 * @package    PHPAssistsTest
 * @subpackage PHPAssistsTest\Shared\Core\Logger
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 * @link https://packagist.org/packages/juanma386/php-assists-class
 *
 */

namespace PHPAssistsTest\Shared\Core\Logger;

use PHPUnit\Framework\TestCase;
use PHPAssists\Shared\Core\Logger\CSVHandler;
use Faker\Factory as FakerFactory;

class CSVHandlerTest extends TestCase {
    private $csvHandler;
    private $testFilePath = 'test.csv';

    protected function setUp(): void {
        $dirpath  = dirname(dirname( __dir__ )) . DIRECTORY_SEPARATOR;
        $this->csvHandler = new CSVHandler( $dirpath . $this->testFilePath);
        $this->csvHandler->checkFileExistsAndCreateIfNotExists();
        $this->faker = FakerFactory::create();
    }

    protected function tearDown(): void {
        if (file_exists($this->testFilePath)) {
            unlink($this->testFilePath);
        }
    }

    public function testCSVOperations() {
        $rows = [];
        for ($i = 0; $i < 5; $i++) {
            $row = [
                $this->faker->name,
                $this->faker->email,
                $this->faker->city
            ];
            $rows[] = $row;
            $this->csvHandler->addRow($row);
        }

        $data = $this->csvHandler->readCSV();
        $this->assertCount(5, $data);

        foreach ($data as $index => $row) {
            $this->assertIsArray($row);
            $this->assertCount(3, $row);

            $this->assertNotEmpty($row[0]);
            $this->assertNotEmpty($row[1]);
            $this->assertNotEmpty($row[2]);

            if ($index === 0) {
                $this->csvHandler->deleteRow($index);
            }
        }

        $dataAfterDeletion = $this->csvHandler->readCSV();
        $this->assertCount(4, $dataAfterDeletion);
    }

    public function testFileExists() {
        $this->assertTrue($this->csvHandler->fileExists());
    }

    public function testTruncateCSV() {
        $this->assertTrue($this->csvHandler->truncateCSV());
    }
}
