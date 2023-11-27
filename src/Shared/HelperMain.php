<?php
class HelperMain {
    public function __construct() {
        spl_autoload_register([$this, 'autoload']);
    }

    private function autoload($className) {
        $namespace = 'Helpers\\'; // Namespace base
        $baseDir = __DIR__ . '/'; // Directorio base

        // Convertir separadores de namespace en separadores de directorio
        $className = str_replace($namespace, '', $className);
        $filePath = $baseDir . str_replace('\\', '/', $className) . '.php';

        // Verificar si el archivo existe antes de incluirlo
        if (file_exists($filePath)) {
            require_once $filePath;
        }
    }
}
?>
