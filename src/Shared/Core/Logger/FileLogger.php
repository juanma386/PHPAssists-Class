<?php
/**
 * PHPAssists Logger API
 *
 * This class defines the possible Functions for the PHPAssists Logger API.
 *
 * @link       https://hexome.com.ar
 * @since      0.0.4
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Core\Logger
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 */
namespace PHPAssists\Shared\Core\Logger;


class FileLogger {
    private $logFile;

    public function __construct(?string $logFile, ?string $folderFilePath) {
        $this->logFile = $logFile . DIRECTORY_SEPARATOR . $folderFilePath;
    }

    public function log($message) {
        $logMessage = '[' . date('Y-m-d H:i:s') . '] ' . $message . PHP_EOL;
        $this->writeToFile($logMessage);
    }

    public function readLog() {
        if (file_exists($this->logFile)) {
            return file_get_contents($this->logFile);
        }
        return null;
    }

    public function deleteLog() {
        if (file_exists($this->logFile)) {
            unlink($this->logFile);
        }
    }

    private function writeToFile($logMessage) {
        file_put_contents($this->logFile, $logMessage, FILE_APPEND);
    }
}