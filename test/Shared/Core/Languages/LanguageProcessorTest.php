<?php

/**
 * PHPAssists Languages API Test
 *
 * This PHPUnit class defines the possible Languages API codes for the PHPAssistsTest Languages API.
 *
 * @link       https://hexome.com.ar
 * @link       https://hexome.cloud
 * @link       https://hexome.es
 * @since      0.0.1
 *
 * @package    PHPAssistsTest
 * @subpackage PHPAssistsTest\Shared\Core\Languages
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 * @link https://packagist.org/packages/juanma386/php-assists-class
 *
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

    public function testEnumValues()
    {
        $this->assertEquals('English', LangEnum::en->value);
        $this->assertEquals('Spanish', LangEnum::es->value);
        $this->assertEquals('French', LangEnum::fr->value);
        $this->assertEquals('German', LangEnum::de->value);
        $this->assertEquals('Italian', LangEnum::it->value);
        $this->assertEquals('Portuguese', LangEnum::pt->value);
        $this->assertEquals('Chinese', LangEnum::zh->value);
        $this->assertEquals('Japanese', LangEnum::ja->value);
        $this->assertEquals('Russian', LangEnum::ru->value);
        $this->assertEquals('Arabic', LangEnum::ar->value);
        $this->assertEquals('Hindi', LangEnum::hi->value);
        $this->assertEquals('Bengali', LangEnum::bn->value);
        $this->assertEquals('Punjabi', LangEnum::pa->value);
        // ... y así sucesivamente para los otros casos
    }

    public function testFrontendLangData()
    {
        $frontendLangData = [
            LangEnum::en->name => 'Hello',
            LangEnum::es->name => 'Hola',
            LangEnum::fr->name => 'Bonjour',
            LangEnum::de->name => 'Hallo',
            LangEnum::it->name => 'Ciao',
            LangEnum::pt->name => 'Olá',
            LangEnum::zh->name => '你好',
            LangEnum::ja->name => 'こんにちは',
            LangEnum::ru->name => 'Привет',
            LangEnum::ar->name => 'مرحبا',
            LangEnum::hi->name => 'नमस्ते',
            LangEnum::bn->name => 'হ্যালো',
            LangEnum::pa->name => 'ਸਤ ਸ੍ਰੀ ਅਕਾਲ',
            // ... y así sucesivamente para los otros casos
        ];

        $this->assertEquals('Hello', $frontendLangData[LangEnum::en->name]);
        $this->assertEquals('Hola', $frontendLangData[LangEnum::es->name]);
        $this->assertEquals('Bonjour', $frontendLangData[LangEnum::fr->name]);
        $this->assertEquals('Hallo', $frontendLangData[LangEnum::de->name]);
        $this->assertEquals('Ciao', $frontendLangData[LangEnum::it->name]);
        $this->assertEquals('Olá', $frontendLangData[LangEnum::pt->name]);
        $this->assertEquals('你好', $frontendLangData[LangEnum::zh->name]);
        $this->assertEquals('こんにちは', $frontendLangData[LangEnum::ja->name]);
        $this->assertEquals('Привет', $frontendLangData[LangEnum::ru->name]);
        $this->assertEquals('مرحبا', $frontendLangData[LangEnum::ar->name]);
        $this->assertEquals('नमस्ते', $frontendLangData[LangEnum::hi->name]);
        $this->assertEquals('হ্যালো', $frontendLangData[LangEnum::bn->name]);
        $this->assertEquals('ਸਤ ਸ੍ਰੀ ਅਕਾਲ', $frontendLangData[LangEnum::pa->name]);
        // ... y así sucesivamente para los otros casos
    }
   
    public function testGetPhraseReturnsString()
    {
        $result = $this->languageProcessor->getPhrase('hello');
        $this->assertIsString($result);
    }

    public function testGetPhraseReturnsExpectedOutput()
    {
        $result = $this->languageProcessor->getPhrase('hello');
        $this->assertEquals('Hello', $result); 
    }

    public function testSetPhraseReturnsExpectedOutput()
    {
        echo ($this->languageProcessor::$APPPATH);
        $expected = "Hola";
        $result = $this->languageProcessor->setPhrase('hello',$expected);
        $this->assertEquals($expected, $result);
    }

    public function testDelPhraseRemovesPhraseIfExists()
    {
        $keyToRemove = 'hello';
        $result = $this->languageProcessor->delPhrase($keyToRemove);
        $this->assertTrue($result);
    }

    public function testDelPhraseReturnsFalseForNonExistentKey()
    {
        $nonExistentKey = 'non_existent_key';
        $result = $this->languageProcessor->delPhrase($nonExistentKey);
        $this->assertFalse($result);
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
