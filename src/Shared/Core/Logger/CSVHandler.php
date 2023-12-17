<?php
/**
 * PHPAssists Logger API
 *
 * This class defines the possible Functions for the PHPAssists Logger API.
 *
 * @link       https://hexome.com.ar
 * @link       https://hexome.cloud
 * @link       https://hexome.es
 * @since      0.0.5
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Core\Logger
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 * @link https://packagist.org/packages/juanma386/php-assists-class
 *
 */
namespace PHPAssists\Shared\Core\Logger;

class CSVHandler {
    private ?string $filePath;

    public function __construct(?string $filePath) {
        $this->setFilePath($filePath);
    }

    public function setFilePath(?string $filePath) : void {
        $this->filePath = $filePath;
    }

    public function getFilePath() : ?string {
        return $this->filePath;
    }

    public function checkFileExistsAndCreateIfNotExists() : void {
        $filePath = $this->getFilePath();
        if (!file_exists($filePath)) {
            touch($filePath);
        }
    }

    public function readCSV() : array {
        $filePath = $this->getFilePath();
        $data = [];

        if (($handle = fopen($filePath, "r")) !== false) {
            while (($row = fgetcsv($handle, 1000, ",")) !== false) {
                $data[] = $row;
            }
            fclose($handle);
        }

        return $data;
    }

    public function addRow(array $row) : void {
        $filePath = $this->getFilePath();

        $handle = fopen($filePath, 'a');
        fputcsv($handle, $row);
        fclose($handle);
    }

    public function updateRow(int $index, array $row) : void {
        $data = $this->readCSV();

        if (isset($data[$index])) {
            $data[$index] = $row;

            $filePath = $this->getFilePath();

            $handle = fopen($filePath, 'w');
            foreach ($data as $row) {
                fputcsv($handle, $row);
            }
            fclose($handle);
        }
    }

    public function deleteRow(int $index) : void {
        $data = $this->readCSV();

        if (isset($data[$index])) {
            unset($data[$index]);

            $data = array_values($data); // Re-index array after deletion

            $filePath = $this->getFilePath();

            $handle = fopen($filePath, 'w');
            foreach ($data as $row) {
                fputcsv($handle, $row);
            }
            fclose($handle);
        }
    }

    public function fileExists(): bool {
        $filePath = $this->getFilePath();
        return file_exists($filePath);
    }

    public function truncateCSV(): bool {
        $filePath = $this->getFilePath();

        // Abre el archivo en modo de escritura y lo trunca (vacía su contenido)
        if ($file = fopen($filePath, 'w')) {
            ftruncate($file, 0); // Vacía el archivo
            fclose($file); // Cierra el archivo
            return true;
        }
        return false;
    }
}