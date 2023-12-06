<?php
namespace PHPAssistsTest\Shared\Core\Response;
/**
 * PHPAssists Response API Test
 *
 * This class defines the possible Functions for the PHPAssists Response API Test.
 *
 * @link       https://hexome.com.ar
 * @since      0.0.1
 *
 * @package    PHPAssistsTest
 * @subpackage PHPAssistsTest\Shared\Core\Response
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 */

use PHPUnit\Framework\TestCase;
use PHPAssists\Shared\Core\Response\HTTPResponse;

class HTTPResponseTest extends TestCase{

    public function testAjaxResponseWithValidDataAndHeader()
    {
        $responseCode = 200;
        $data = [
            'message' => 'Success!',
            'info' => 'Valid data.'
        ];
        $header = true;

        $expected = json_encode([
            'status' => $responseCode,
            'data' => $data
        ], JSON_PRETTY_PRINT);

        $this->assertEquals($expected, HTTPResponse::ajaxResponse($responseCode, $data, $header));
    }

    public function testAjaxResponseWithInvalidDataAndHeader()
    {
        $responseCode = 400;
        $data = null; // Invalid data
        $header = true;

        $expected = json_encode([
            'status' => HTTPResponse::$BAD_REQUEST,
        ], JSON_PRETTY_PRINT);

        $this->assertEquals($expected, HTTPResponse::ajaxResponse($responseCode, $data, $header));
    }

    public function testAjaxResponseMethodWithNoHeader()
    {
        $responseCode = 200;
        $data = [
            'message' => 'Success!',
            'info' => 'Valid data.'
        ];
        $header = false; // No header sent

        $expected = json_encode([
            'status' => $responseCode,
            'data' => $data
        ], JSON_PRETTY_PRINT);

        $this->assertEquals($expected, HTTPResponse::ajaxResponse($responseCode, $data, $header));
    }

}
