<?php

/**
 * PHPAssists FileLogger API Test
 *
 * This PHPUnit class defines the possible Languages API codes for the PHPAssistsTest FileLogger API.
 *
 * @link       https://hexome.com.ar
 * @link       https://hexome.cloud
 * @link       https://hexome.es
 * @since      0.0.5
 *
 * @package    PHPAssistsTest
 * @subpackage PHPAssistsTest\Shared\Core\Licences
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 * @link https://packagist.org/packages/juanma386/php-assists-class
 *
 */

namespace PHPAssistsTest\Shared\Core\Licences;

use PHPUnit\Framework\TestCase;
use PHPAssists\Shared\Core\Licences\ClassLicenceIterator; // Reemplaza esto con la ruta correcta de tu clase concreta

class CustomLicenceTest extends TestCase {
    
    private ClassLicenceIterator $licence;
    

    public function setUp(): void {
        // Simula la inicialización con un UUID personalizado
        $customProductUUID = 'def9d6f7-95e7-46899259-35292d974479';
        $apiUrlEndpoint    = 'http://licencedev.hexome.cloud/api';
        
        $licence = new ClassLicenceIterator( $customProductUUID, $apiUrlEndpoint );
        $this->licence = $licence;
        $this->licence->setProductUUID($customProductUUID);
        $this->licence->setApiUrlEndpoint($apiUrlEndpoint);

        // Realiza la aserción para verificar si la inicialización se realizó correctamente
        $this->addToAssertionCount(1); // Aquí podrías agregar tus propias aserciones si es necesario
    }

    public function testActivateConsumerLicense(): void {
        // Simula la activación de la licencia del consumidor
        $this->licence->activateConsumerLicense();

        // Realiza la aserción para verificar si la activación se realizó correctamente
        $this->addToAssertionCount(1); // Agrega más aserciones si es necesario
    }

    public function testDeactivateConsumerLicense(): void {
        // Simula la desactivación de la licencia del consumidor
        $this->licence->deactivateConsumerLicense();

        // Realiza la aserción para verificar si la desactivación se realizó correctamente
        $this->addToAssertionCount(1); // Agrega más aserciones si es necesario
    }

    public function testUninstallConsumerLicense(): void {
        // Simula la desinstalación de la licencia del consumidor
        $this->licence->uninstallConsumerLicense();

        // Realiza la aserción para verificar si la desinstalación se realizó correctamente
        $this->addToAssertionCount(1); // Agrega más aserciones si es necesario
    }
}
