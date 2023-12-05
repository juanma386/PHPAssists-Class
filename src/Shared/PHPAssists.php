<?php

namespace PHPAssists\Shared;

use ReflectionClass;
use PHPAssists\Shared\Config\Configurator;
class PHPAssists
{
    public function __construct()
    {
        $directory = __dir__; // Reemplaza con la ruta de tu directorio

        // Obtiene todos los archivos del directorio
        $files = scandir($directory);

        foreach ($files as $file) {
            // Verifica si es un archivo PHP
            if (pathinfo($file, PATHINFO_EXTENSION) === 'php') {
                $class = pathinfo($file, PATHINFO_FILENAME);
                $className = "PHPAssists\\Shared\\$class";

                // Verifica si la clase es una subclase de PHPAssists
                if (is_subclass_of($className, 'PHPAssists\Shared')) {
                    $reflection = new ReflectionClass($className);
                    $constructor = $reflection->getConstructor();

                    // Si tiene constructor, llama al constructor
                    if ($constructor !== null) {
                        $constructor->invoke($this);
                    }
                }
            }
        }
    }

    // Método para obtener todas las subclases de PHPAssists
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
