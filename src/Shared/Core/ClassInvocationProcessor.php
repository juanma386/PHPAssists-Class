<?php
namespace PHPAssists\Shared\Core;

class ClassInvocationProcessor {
    public function __construct() {
        // Incrementar el contador de uso al inicializar la clase
        $this->incrementUsageCount();
    }

    public function someMethod() {
        // Lógica de la función someMethod()
        // Incrementar el contador de uso al llamar a este método
        $this->incrementUsageCount();
    }

    private function incrementUsageCount() {
        // Ruta hacia la carpeta tmp
        $tmpFolderPath = __DIR__ . '/../../test/';

        // Verifica si la carpeta tmp existe, si no, créala
        if (!file_exists($tmpFolderPath)) {
            mkdir($tmpFolderPath, 0755, true);
        }

        // Ruta completa al archivo init.json dentro de la carpeta tmp
        $filePath = $tmpFolderPath . 'init.json';

        // Obtener el contenido del archivo init.json si existe
        $jsonData = file_exists($filePath) ? file_get_contents($filePath) : '{}';
        $initData = json_decode($jsonData, true);

        // Incrementar el contador de uso de ClassInvocationProcessor
        if (!isset($initData['ClassInvocationProcessor_usage'])) {
            $initData['ClassInvocationProcessor_usage'] = 1;
        } else {
            $initData['ClassInvocationProcessor_usage']++;
        }

        // Guardar el valor actualizado en el archivo init.json en la carpeta tmp
        file_put_contents($filePath, json_encode($initData, JSON_PRETTY_PRINT));
    }
}
?>
