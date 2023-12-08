<?php

/**
 * PHPAssists FileLogger API Test
 *
 * This PHPUnit class defines the possible Languages API codes for the PHPAssistsTest FileLogger API.
 *
 * @link       https://hexome.com.ar
 * @since      0.0.4
 *
 * @package    PHPAssistsTest
 * @subpackage PHPAssistsTest\Shared\Core\Logger
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 */

namespace PHPAssistsTest\Shared\Core\Languages;

use PHPUnit\Framework\TestCase;
use PHPAssists\Shared\Core\Logger\FileLogger;

class FileLoggerTest extends TestCase {

    private FileLogger $FileLogger;

    private $folderFilePath = "debug.log";

    protected function setUp(): void {
        parent::setUp();
        $APPPATH = (string)dirname(dirname(dirname(
                __dir__ 
        )));
        $folderFilePath = "debug.log";
        $this->FileLogger = new FileLogger($APPPATH, $folderFilePath);
    }


    public function testLogSingleMessage() {
        $this->expectOutputString('');
        $this->FileLogger->log('Test log message.');
        $this->expectOutputString(''); // Update this line if expecting an output
    }

    public function testLogMultipleMessages() {
        $this->expectOutputString('');
        $this->FileLogger->log('First test log message.');
        $this->FileLogger->log('Second test log message.');
        $this->expectOutputString(''); // Update this line if expecting an output
    }

    public function testReadLog() {
        $this->FileLogger->log('This is a test log message.');
        $content = $this->FileLogger->readLog();
        $this->assertStringContainsString('This is a test log message.', $content);
    }

    public function testDeleteLog() {
        $this->FileLogger->log('This log will be deleted.');
        $this->FileLogger->deleteLog();
        $content = $this->FileLogger->readLog();
        $this->assertNull($content);
    }


}