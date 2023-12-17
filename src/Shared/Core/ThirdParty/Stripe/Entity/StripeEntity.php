<?php namespace PHPAssists\Shared\Core\ThirdParty\Stripe\Entity;
/**
 * PHPAssists Stripe API
 *
 * This class defines the possible Stripe API algo for the PHPAssists Stripe API.
 *
 * @link       https://hexome.com.ar
 * @link       https://hexome.cloud
 * @link       https://hexome.es
 * @since      0.0.5
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Core\ThirdParty\Stripe
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 * @link https://packagist.org/packages/juanma386/php-assists-class
 *
 */

use StripeAPI;
use PHPAssists\Shared\Core\Logger\CSVHandler;
class StripeEntity {
    private ?string $stripeApiKey;
    private ?string $currentDir = null;
    private CSVHandler $csvHandler;
    private StripeAPI $stripeAPI;

    public function __construct(?string $stripeApiKey, ?string $currentDir, StripeAPI $stripeAPI, CSVHandler $csvHandler) {
        $this->setCurrentDir($currentDir);
        $this->setKeySecret((string) $stripeApiKey);
        $this->csvHandler = $csvHandler;
        $this->stripeAPI = $stripeAPI;
    }

    private function inicializate() : void {
        $this->file = $this->currentDir . DIRECTORY_SEPARATOR . ($this->fileName ?? null);
    }

    private function getFile() : ?string {
        return $this->file;
    }

    public function getCurrentDir() : ?string {
        return $this->currentDir;
    }

    private function setCurrentDir(?string $currentDir) : void {
        if (!$this->getCurrentDir()) {
            $this->currentDir = $currentDir;
        }
    }

    private function getKeySecret() : ?string {
        return $this->stripeApiKey;
    }

    private function setKeySecret(?string $stripeApiKey) : void {
        $this->stripeApiKey = $stripeApiKey;
    }
}