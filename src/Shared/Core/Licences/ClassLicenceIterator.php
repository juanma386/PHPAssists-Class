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
 * @subpackage PHPAssists\Shared\Core
 * @author     Hexome Cloud <hi@hexome.cloud>
 * @link https://packagist.org/packages/juanma386/php-assists-class
 *
 */

namespace PHPAssists\Shared\Core\Licences;

use PHPAssists\Shared\Core\Licences\Abstracts\AbstractLicence;

/**
 * Class ClassLicenceIterator
 *
 * This class extends the AbstractLicence class and manages license-related functionalities.
 */
class ClassLicenceIterator extends AbstractLicence {

    /** @var string $productUUID The UUID of the product. */
    public ?string $productUUID = 'def9d6f7-95e7-46899259-35292d974478';
    public ?string $APIUrl      =  'http://licencedev.hexome.cloud/api/';

    /**
     * Initializes the license manager with a custom product UUID if provided.
     *
     * @param string|null $productUUID The custom product UUID.
     * @return void
     */
    public function __constructor(?string $productUUID,?string $APIUrl ): void {
        $this->setProductUUID($productUUID);
        $this->setApiUrlEndpoint($APIUrl);
    }

    public function setProductUUID(?string $productUUID) : void {
        $this->productUUID = $productUUID;
    }

    public function setApiUrlEndpoint(?string $APIUrl) : void {
        $this->APIUrl = $APIUrl . DIRECTORY_SEPARATOR;
    }

    public function getProductUUID() : ? string {
        return $this->productUUID;
    }

    public function getApiUrlEndpoint() : ? string {
        return $this->APIUrl;
    }

    /**
     * Activates the consumer license by sending a request to the activation URL.
     *
     * @return void
     */
    public function activateConsumerLicense() : void {
        $api_url = $this->getApiUrlEndpoint() . self::ACTIVATE_URL . $this->getProductUUID();
        self::sendLicenseRequest($api_url);
    }

    /**
     * Deactivates the consumer license by sending a request to the deactivation URL.
     *
     * @return void
     */
    public function deactivateConsumerLicense() : void  {
        $api_url = $this->getApiUrlEndpoint() . self::DEACTIVATE_URL . $this->getProductUUID();
        self::sendLicenseRequest($api_url);
    }

    /**
     * Uninstalls the consumer license by sending a request to the uninstallation URL.
     * If the request is successful, the license will be uninstalled.
     *
     * @return void
     */
    public function uninstallConsumerLicense() : void  {
        $api_url = $this->getApiUrlEndpoint() . self::UNINSTALL_URL . $this->getProductUUID();
        self::sendLicenseRequest($api_url);
    }
}
?>
