<?php
class HelperMain {
    public function __construct() {
        spl_autoload_register([$this, 'autoload']);
    }

    private function autoload($className) {
        $namespace = 'Helpers\\'; // Namespace base
        $baseDir = __DIR__ . '/'; // Directorio base

        $className = str_replace($namespace, '', $className);
        $filePath = $baseDir . str_replace('\\', '/', $className) . '.php';

        // Verificar si el archivo existe en el directorio base
        if (file_exists($filePath)) {
            require_once $filePath;
            return;
        }

        // Buscar recursivamente en subdirectorios
        $this->autoloadInSubdirectories($baseDir, $className);
    }

    private function autoloadInSubdirectories($directory, $className) {
        $directoryIterator = new RecursiveDirectoryIterator($directory);
        $iterator = new RecursiveIteratorIterator($directoryIterator);
        
        foreach ($iterator as $file) {
            if ($file->isDir()) {
                continue; // Ignorar si es un directorio
            }
            
            $filePath = $file->getPathname();
            $filePathWithoutBase = str_replace(__DIR__ . '/', '', $filePath);

            if (strpos($filePathWithoutBase, $className . '.php') !== false) {
                require_once $filePath;
                return;
            }
        }
    }
}
?>

