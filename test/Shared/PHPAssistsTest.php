<?php

/**
 * PHPAssists API Test
 *
 * This PHPUnit class defines the possible API codes for the PHPAssistsTest API.
 *
 * @link       https://hexome.com.ar
 * @since      0.0.1
 *
 * @package    PHPAssistsTest
 * @subpackage PHPAssistsTest\Shared
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 */

namespace PHPAssistsTest\Shared;
use PHPUnit\Framework\TestCase;
use PHPAssists\Shared\PHPAssists;

class PHPAssistsTest extends \PHPUnit\Framework\TestCase
{
    public function testClassInstantiationRecursive()
    {
        // Ruta al directorio que deseas escanear
        $directory = dirname((dirname(__DIR__))) . DIRECTORY_SEPARATOR . "src";

        $classesLoaded = $this->getClassesWithNamespace($directory);

        $this->assertNotEmpty($classesLoaded, 'Al menos una clase con un namespace válido debe cargarse');
    }

    // Método para obtener todas las clases con namespace en el directorio y subdirectorios
    private function getClassesWithNamespace($directory)
    {
        $classesLoaded = [];

        $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($directory));
        foreach ($iterator as $file) {
            if ($file->isFile() && $file->getExtension() === 'php') {
                $className = $this->getClassName($file->getPathname());
                if ($className !== null) {
                    $classesLoaded[] = $className;
                }
            }
        }

        return $classesLoaded;
    }

    // Método para obtener el nombre de la clase a partir del nombre del archivo
    private function getClassName($filePath)
    {
        $tokens = token_get_all(file_get_contents($filePath));
        $namespace = '';
        $className = null;

        foreach ($tokens as $key => $token) {
            if (is_array($token) && $token[0] === T_NAMESPACE) {
                // Obtener el namespace
                $namespace = '';
                for ($i = $key + 1; isset($tokens[$i]); $i++) {
                    if (is_array($tokens[$i]) && in_array($tokens[$i][0], [T_STRING, T_NS_SEPARATOR])) {
                        $namespace .= $tokens[$i][1];
                    } elseif ($tokens[$i] === ';') {
                        break;
                    }
                }
                $namespace .= '\\';
            }

            if (is_array($token) && $token[0] === T_CLASS) {
                // Obtener el nombre de la clase
                for ($i = $key + 1; isset($tokens[$i]); $i++) {
                    if (is_array($tokens[$i]) && $tokens[$i][0] === T_STRING) {
                        $className = $namespace . $tokens[$i][1];
                        break;
                    }
                }
                break;
            }
        }

        return $className;
    }
}
