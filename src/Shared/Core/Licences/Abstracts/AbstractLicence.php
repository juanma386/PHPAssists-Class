<?php
/**
 * PHPAssists License Class
 *
 * This class provides the core functionality for managing licenses in PHPAssists plugins.
 * It handles the registration of license actions and filters, as well as the communication with the Hexome Cloud license API.
 *
 * @link       https://hexome.com.ar
 * @link       https://hexome.cloud
 * @link       https://hexome.es
 * @since      0.0.1
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Core\Licences\Abstracts
 * @author     Hexome Cloud <hi@hexome.cloud>
 * @link https://packagist.org/packages/juanma386/php-assists-class
 *
 */


namespace PHPAssists\Shared\Core\Licences\Abstracts;


abstract class AbstractLicence {


    /**
     * Product UUID
     *
     * The unique identifier for the plugin.
     *
     * @const string
     */
    const PRODUCT_UUID = null;

    /**
     * Hexome Cloud License API URL
     *
     * The URL of the Hexome Cloud license API.
     *
     * @const string
     */
    const API_URL = null;

    /**
     * Specific URLs for each action
     *
     * Define the specific URLs for each license action.
     *
     * @const string
     */
    const ACTIVATE_URL = 'activate-consumer/';
    const DEACTIVATE_URL =  'deactivate-consumer/';
    const UNINSTALL_URL = 'uninstall-consumer/';


    abstract protected function setProductUUID(?string $productUUID) : void;

    abstract protected function setApiUrlEndpoint(?string $APIUrl) : void;

    abstract protected function getProductUUID() : ? string;

    abstract protected function getApiUrlEndpoint() : ? string;

    /**
     * Activate Consumer License
     *
     * This method is called to activate the consumer license for the plugin.
     *
     * @abstract
     */
    abstract public function activateConsumerLicense(): void;

    /**
     * Deactivate Consumer License
     *
     * This method is called to deactivate the consumer license for the plugin.
     *
     * @abstract
     */
    abstract public function deactivateConsumerLicense(): void;

    /**
     * Uninstall Consumer License
     *
     * This method is called to uninstall the consumer license for the plugin.
     *
     * @abstract
     */
    abstract public function uninstallConsumerLicense(): void;

    /**
     * Send consumer license function.
     *
     * @param string $url endpoint with Product UUID.
     * @return mixed
     */

     protected static function sendLicenseRequest($url): bool {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
            ),
        ));
    
        $response = curl_exec($curl);
        $error = curl_error($curl);
    
        curl_close($curl);
    
        if ($error) {
            return false;
        }
    
        $data = json_decode($response, true);
    
        return true;
    }

    
}
