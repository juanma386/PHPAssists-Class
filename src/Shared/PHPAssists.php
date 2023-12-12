<?php
/**
 * PHPAssists API
 *
 * This class defines the possible Functions for the PHPAssists gAPI.
 *
 * @link       https://hexome.com.ar
 * @since      0.0.1
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 * @link https://packagist.org/packages/juanma386/php-assists-class
 *
 */

namespace PHPAssists\Shared;

use ReflectionClass;
use PHPAssists\Shared\Config\Configurator;
class PHPAssists
{
    public function __construct()
    {
        $directory = __dir__;
        $files = scandir($directory);

        foreach ($files as $file) {
            if (pathinfo($file, PATHINFO_EXTENSION) === 'php') {
                $class = pathinfo($file, PATHINFO_FILENAME);
                $className = "PHPAssists\\Shared\\$class";
                if (is_subclass_of($className, 'PHPAssists\Shared')) {
                    $reflection = new ReflectionClass($className);
                    $constructor = $reflection->getConstructor();
                    if ($constructor !== null) {
                        $constructor->invoke($this);
                    }
                }
            }
        }
    }

    private function getSubClasses()
    {
        $subClasses = [];
        $allClasses = get_declared_classes();

        foreach ($allClasses as $class) {
            if (is_subclass_of($class, 'PHPAssists\Shared\PHPAssists')) {
                $subClasses[] = $class;
            }
        }
        return $subClasses;
    }

    // ...
}
