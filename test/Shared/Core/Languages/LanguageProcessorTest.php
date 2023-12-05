<?php

/**
 * PHPAssists Languages API Test
 *
 * This PHPUnit class defines the possible Languages API codes for the PHPAssistsTest Languages API.
 *
 * @link       https://hexome.com.ar
 * @since      1.0.0
 *
 * @package    PHPAssistsTest
 * @subpackage PHPAssistsTest\Shared\Core\Languages
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 */

namespace PHPAssistsTest\Shared\Core\Languages;

use PHPUnit\Framework\TestCase;
use PHPAssists\Shared\Core\Languages\Enumerators\LangEnum;
use PHPAssists\Shared\Core\Languages\LanguageProcessor;

class LanguageProcessorTest extends TestCase {

    private LanguageProcessor $languageProcessor;


    protected function setUp(): void {
        parent::setUp();
        $APPPATH = (string)dirname(dirname(dirname(
                __dir__ 
            )));

        $folderDir = "Json" . DIRECTORY_SEPARATOR;
        $this->languageProcessor = new LanguageProcessor($APPPATH, $folderDir);
        $this->languageProcessor->setROOTPath($APPPATH);
        $this->languageProcessor->init(); 
    }

    public function testParseDefaultLanguageWithValidAcceptHeader() {
        $httpAccept = "en-US,en;q=0.9,es;q=0.8";
        $expectedLanguage = "en"; 

        $resultLanguage = $this->languageProcessor->parseDefaultLanguage($httpAccept);
        
        $this->assertEquals($expectedLanguage, $resultLanguage);
    }

    public function testParseDefaultLanguageWithNoAcceptHeader() {
        $httpAccept = null;
        $expectedLanguage = "en"; 

        $resultLanguage = $this->languageProcessor->parseDefaultLanguage($httpAccept);
        
        $this->assertEquals($expectedLanguage, $resultLanguage);
    }

    public function testParseAcceptLanguage() {
        $httpAccept = "en-US,en;q=0.9,es;q=0.8";
        $expectedLanguages = [
            "en-US" => 1.0,
            "en" => 0.9,
            "es" => 0.8
        ];

        $resultLanguages = $this->languageProcessor->parseAcceptLanguage($httpAccept);
        
        $this->assertEquals($expectedLanguages, $resultLanguages);
    }

    public function testGetPreferredLanguage() {
        $languages = [
            "en-US" => 1.0,
            "en" => 0.9,
            "es" => 0.8
        ];
        $expectedPreferredLanguage = "en-US"; 

        $resultPreferredLanguage = $this->languageProcessor->getPreferredLanguage($languages);
        
        $this->assertEquals($expectedPreferredLanguage, $resultPreferredLanguage);
    }

    public function testParseDefaultLanguageHTMLWithValidAcceptHeader()
    {
        $languageProcessor = $this->languageProcessor;
    
        $httpAccept = "en-US,en;q=0.9,es;q=0.8";
        $expectedLanguage = "en-us"; 
    
        $resultLanguage = $languageProcessor->parseDefaultLanguageHTML($httpAccept);
        
        $this->assertEquals(strtolower($expectedLanguage), strtolower($resultLanguage));
    }
    

    public function testParseDefaultLanguageHTMLWithNoAcceptHeader()
    {
        $languageProcessor = $this->languageProcessor;

        $httpAccept = null;
        $expectedLanguage = LanguageProcessor::$DEFAULT_LANGUAGE;

        $resultLanguage = $languageProcessor->parseDefaultLanguageHTML($httpAccept);
        
        $this->assertEquals($expectedLanguage, $resultLanguage);
    }

    public function testGetDefaultLanguageHTML()
    {
        $_SERVER["HTTP_ACCEPT_LANGUAGE"] = "en-US,en;q=0.9,es;q=0.8";
        $languageProcessor = $this->languageProcessor;

        $expectedLanguage = "en";

        $resultLanguage = $languageProcessor->getDefaultLanguageHTML();
        
        $this->assertEquals($expectedLanguage, $resultLanguage);
    }

    public function testParseDefaultLanguage()
    {
        $httpAccept = "en-US,en;q=0.9,es;q=0.8";
        $expectedLanguage = "en";
        $languageProcessor = $this->languageProcessor;

        $resultLanguage = $languageProcessor->parseDefaultLanguage($httpAccept);
        
        $this->assertEquals($expectedLanguage, $resultLanguage);
    }


    public function testLanguageDataAssignment()
    {
        $frontendModel = null; 
        $frontendLangData = $this->languageProcessor->fetchTestFrontendLangData($frontendModel);
        $this->assertEquals('English', LangEnum::en->value);
        $this->assertEquals('Spanish', LangEnum::es->value);
        $this->assertEquals('Romanian', LangEnum::ro->value);
        $this->assertEquals('French', LangEnum::fr->value);
        $this->assertEquals('Italian', LangEnum::it->value);
        $this->assertEquals('Hello', $frontendLangData[LangEnum::en->name]);
        $this->assertEquals('Hola', $frontendLangData[LangEnum::es->name]);
        $this->assertEquals('Salut', $frontendLangData[LangEnum::ro->name]);
        $this->assertEquals('Bonjour', $frontendLangData[LangEnum::fr->name]);
        $this->assertEquals('Ciao', $frontendLangData[LangEnum::it->name]);
    }
   

    public function testFileOperations() {
        $languageProcessor = new LanguageProcessor(); // Instancia de la clase principal
    
        // Establecer las rutas usando dirname(__DIR__)
        $folderPath = dirname(__DIR__) . '/'; // Ruta a la carpeta
        $filePath = dirname(__DIR__) . '/example.json'; // Ruta al archivo
    
        // Aserciones para las operaciones de archivo
        $this->assertTrue($languageProcessor->detectFolder($folderPath));
        //echo ($filePath);
        $languageProcessor->deleteFile($filePath);
        $this->assertFalse($languageProcessor->detectFile($filePath)); // Verificar que el archivo no existe inicialmente
    
        $data = '{"key": "value"}'; // Datos a escribir o actualizar en el archivo
    
        //echo $filePath;
        // Actualizar archivo
        $this->assertTrue($languageProcessor->updateFile($filePath, $data));
    
        // Verificar que el archivo existe después de la actualización
        $this->assertTrue($languageProcessor->detectFile($filePath));
    
        // Leer archivo
        $content = $languageProcessor->readFile($filePath);
        $this->assertEquals($data, $content); // Verificar que los datos leídos son los mismos que se actualizaron
    
        // Borrar archivo
        $this->assertTrue($languageProcessor->deleteFile($filePath));
        $this->assertFalse($languageProcessor->detectFile($filePath)); // Verificar que el archivo fue eliminado
    }
    
    
    public function testSaveDefaultJSONFile() {
        
        $languageCode = strtolower(LangEnum::en->value); // Código de idioma para la prueba
        $tempFilePath = $this->languageProcessor->createTemporaryFile(); // Crear archivo temporal
        
        // Configurar el archivo english.json esperado
        $expectedFile = $this->languageProcessor->getFilePath();

        // Reemplazar la ruta del archivo english.json en el método saveDefaultJSONFile con el archivo temporal
        $this->languageProcessor->setEnglishFilePath($tempFilePath);
        
        $result = $this->languageProcessor->saveDefaultJSONFile($languageCode);
        
        // Verificar que el archivo exista antes de intentar eliminarlo
        $this->assertFileExists($expectedFile, 'El archivo debe existir antes de intentar eliminarlo');

        // Llamar a la función deleteFileIfExists para eliminar el archivo
        $result = $this->languageProcessor->deleteFileIfExists($expectedFile);

        // Verificar si el archivo fue eliminado correctamente
        $this->assertTrue($result, 'El archivo debe haber sido eliminado correctamente');

        // Verificar que el archivo ya no exista después de la eliminación
        $this->assertFileDoesNotExist($expectedFile, 'El archivo no debe existir después de la eliminación');
    }
    

    
    
    // ...
}
