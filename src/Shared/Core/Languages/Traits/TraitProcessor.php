<?php

/**
 * PHPAssists Languages API
 *
 * This class defines the possible Languages API codes for the PHPAssists Languages API.
 *
 * @link       https://hexome.com.ar
 * @since      1.0.0
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Core\Languages\Traits
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 */

namespace PHPAssists\Shared\Core\Languages\Traits;

trait TraitProcessor {

    public static function parseDefaultLanguageHTML($http_accept, $deflang = null) {
        $defaultLanguage = $deflang ?? self::$DEFAULT_LANGUAGE;    
    
    
        if (isset($http_accept) && strlen($http_accept) > 1) {
            $acceptedLanguages = [];
            preg_match_all(self::REGEX_HTMLPARSE, $http_accept, $matches, PREG_SET_ORDER);
    
            foreach ($matches as $match) {
                $lang = $match[1];
                $qval = isset($match[2]) ? (float)$match[2] : 1.0;
                $acceptedLanguages[$lang] = $qval;
            }
    
            if (!empty($acceptedLanguages)) {
                arsort($acceptedLanguages); 
                $defaultLanguage = key($acceptedLanguages); 
            }
        }
    
        return strtolower($defaultLanguage);
    }


    public static function getDefaultLanguageHTML() {
        return substr(isset($_SERVER["HTTP_ACCEPT_LANGUAGE"]) ? self::parseDefaultLanguageHTML($_SERVER["HTTP_ACCEPT_LANGUAGE"]) : self::parseDefaultLanguageHTML(null), 0, 2);
    }


    function parseDefaultLanguage($http_accept, $deflang = "en") {
        if(isset($http_accept) && strlen($http_accept) > 1)  {
            $languages = $this->parseAcceptLanguage($http_accept);
            
            $deflang = $this->getPreferredLanguage($languages);
        }
        
        return strtolower(substr($deflang, 0, 2));
    }
    

    public function parseAcceptLanguage($http_accept) {
        $languages = [];
        $languageValues = explode(",",$http_accept);
        
        foreach ($languageValues as $value) {
            if(preg_match(self::REGEX_DEFAULTLANGUAGE, $value, $matches))
                $languages[$matches[1]] = (float)$matches[2];
            else
                $languages[$value] = 1.0;
        }
        
        return $languages;
    }

    public function getPreferredLanguage($languages) {
        $maxQvalue = 0.0;
        $preferredLanguage = '';

        foreach ($languages as $key => $value) {
            if ($value > $maxQvalue) {
                $maxQvalue = (float)$value;
                $preferredLanguage = $key;
            }
        }

        return $preferredLanguage;
    }
    

    function getBrowserLanguage() {
        try {
            $frontendModel = null;
            $json_data = $this->fetchFrontendLangData($frontendModel);
        } catch (\Throwable $th) {
            $json_data = json_encode([
                "en" => "english",
                "es" => "spanish",
                "it" => "italian",
                "pr" => "portuguese",
            ]);
        }
        
        $client_lang = $this->getDefaultLanguageHTML();
        $json_data_decode = json_decode($json_data, true);
        
        if (isset($json_data_decode[$client_lang])) {
            return $json_data_decode[$client_lang];
        } else {
            // Si el idioma del cliente no está definido en los datos recuperados, se puede manejar aquí.
            // Por ejemplo, podrías devolver el idioma predeterminado o realizar otra acción.
            return "english"; // Idioma predeterminado como valor de respaldo
        }
    }
    
    private function fetchFrontendLangData($frontendModel) {
        $json_data = "";
        $frontendLangRows = $frontendModel->findAll();
    
        foreach ($frontendLangRows as $row) {
            if ($row["type"] == "frontend_lang_available") {
                $json_data = $row["description"];
                break; 
            }
        }
    
        return json_decode($json_data, true);
    }
    
    public function fetchTestFrontendLangData($frontendModel) : array
    {
            return [
                'en' => 'Hello',        
                'es' => 'Hola',
                'ro' => 'Salut',
                'fr' => 'Bonjour',
                'it' => 'Ciao'
            ];
    }



    function saveJSONFile($language_code, $updating_key, $updating_value)
    {
        self::setFileName($language_code);
        self::initPath(); 
        $filePath = self::getFilePath(); // Ruta completa del archivo

        $jsonString = [];
    
        // Crear el archivo si no existe y escribir datos
        if (!file_exists($filePath)) {
            self::createFileIfNotExist($filePath);
        }
    
        $jsonString = file_get_contents($filePath);
        $jsonArray = json_decode($jsonString, true);
    
        if ($jsonArray === null) {
            throw new Exception("Error decoding JSON in file: $filePath");
        }
    
        $jsonArray[$updating_key] = $updating_value;
    
        $jsonData = json_encode($jsonArray, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    
        if ($jsonData === false) {
            throw new Exception("Error encoding JSON data for file: $filePath");
        }
    
        $result = file_put_contents($filePath, stripslashes($jsonData));
    
        if ($result === false) {
            throw new Exception("Error writing data to file: $filePath");
        }

    
        $result = file_put_contents($filePath, stripslashes($jsonData));
    
        if ($result === false) {
            throw new Exception("Error writing data to file: $filePath");
        }
    
        // Actualizar la fecha de modificación del archivo
        touch($filePath);
    }
    


    private static function createFileIfNotExist(string $filePath, string $initialContent = ''): void {
        if (!file_exists($filePath)) {
            $folderPath = $filePath;
            file_put_contents($filePath, $initialContent);
        }
    }
    
    


    public function init() {
        $this->defineAppAndRootPath();
        // ...
    }

    private function defineAppAndRootPath() {
        
    }
    

    // Método para establecer la ruta del archivo english.json
    public function setEnglishFilePath(string $filePath) {
        $this->englishFilePath = $filePath;
    }


    


    // Método saveDefaultJSONFile actualizado para usar la ruta del archivo english.json definida
    public function saveDefaultJSONFile($language_code) {
        self::inicializate((string) $language_code);
        self::setFileName($language_code);
        self::initPath(); 
        $newLangFile = self::getFilePath(); // Ruta completa del archivo
        if (!file_exists($newLangFile)) {
            if (!file_exists($newLangFile)) {
                mkdir($newLangFile, 0777, true);
            }

            // Copiar el archivo english.json de la ruta definida en setEnglishFilePath
            if ($this->englishFilePath !== '' && file_exists($this->englishFilePath)) {
                copy($this->englishFilePath, $newLangFile);
            }
        }
    }



    public static function createDirectoryIfNotExists(string $directoryPath) {
        if (!file_exists($directoryPath)) {
            mkdir($directoryPath, 0777, true);
            return true; // Directorio creado con éxito
        } else {
            return false; // El directorio ya existe
        }
    }

    public function deleteFileIfExists(string $language_code): bool {
        self::inicializate((string) $language_code);
        self::setFileName($language_code);
        self::initPath(); 
        $deleteLangFile = self::getFilePath(); // Ruta completa del archivo
        
        if (file_exists($deleteLangFile)) {
            unlink($deleteLangFile);
            return true; // El archivo existía y fue eliminado
        } else {
            return false; // El archivo no existía
        }
    }
    


    private static function inicializate(?string $language_code): void {
        self::setFileName($language_code);
        self::initPath(); 
        $inicializateLangFile = self::getFilePath(); // Ruta completa del archivo

        if (isset($language_code) && !empty($language_code)) 
            {  self::setFileName($language_code); } 
        else 
            { self::setFileName(strtolower(LangEnum::en->value)); }
        $folderPath = self::getPath();
        touch($inicializateLangFile);
        self::createDirectoryIfNotExists((string) $folderPath);
        self::createFileIfNotExist((string)$inicializateLangFile, '{}');
    }
    
    function setROOTPath( ? string $ROOTPATH) : void {
        if ($ROOTPATH)
        self::$ROOTPATH = $ROOTPATH;
    }


    public function setPhrase($key, $value): ?string
    {
        // Tu lógica para actualizar la frase aquí
        $languageCode = $this->getBrowserLanguage();
        $key = strtolower(preg_replace('/\s+/', '_', $key));
        
        // Abre el archivo JSON correspondiente al idioma
        $langArray = $this->openJSONFile($languageCode);
        
        // Actualiza la frase con la nueva clave y valor
        $langArray[$key] = $value;
        
        // Convierte el array a formato JSON
        $jsonData = json_encode($langArray, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        
        file_put_contents(self::getFilePath(), stripslashes($jsonData));
        
        // Retorna el valor actualizado
        return $value;
    }

    public function getPhrase($phrase = '', $p = false) : ? string {

		if ( !isset($language_code)){ 
			try {
				foreach ((new \App\Models\SettingModel())->findAll() as $row) { 
					if ($row["type"] == "language"):
                        self::setFileName($row["description"]);
					endif;
				}
			} catch (\Throwable $th) {
				//throw $th;
				self::setFileName("english");
			}
			self::initPath(); 
        }

		self::$language_code = $this->getBrowserLanguage();
		
		$key = strtolower(preg_replace('/\s+/', '_', $phrase));

		$langArray = $this->openJSONFile(self::$language_code);
		if (is_array($langArray) && array_key_exists($key, $langArray)) {
		} else {
			$langArray[$key] = ucfirst(str_replace('_', ' ', $key));
			$jsonData = json_encode($langArray, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
			file_put_contents(self::$ROOTPATH . DIRECTORY_SEPARATOR . self::$language_code . '.json', stripslashes($jsonData));
		}
		if ($p != true): return ucwords($langArray[$key]); elseif ($p != false): return strtolower($langArray[$key]); endif;
	}


    public static function openJSONFile($language_code) : array  {


        try {
            return (
                [
                    self::setFileName($language_code),
                    self::initPath(),
                    !self::detectFile(self::getFilePath()) ? touch(self::getFilePath()) : false,
                    $jsonString = self::readFile(self::getFilePath()),
                ]
            ) ? ( json_decode($jsonString, true) ?: [] ) : [];
        } catch (\RuntimeException $e) {
            die("Error: " . $e->getMessage());
        }

        return [];
    }

    public function createTemporaryFile() {
        $tempDir = sys_get_temp_dir();
        $tempFilePath = tempnam($tempDir, 'test_');
        file_put_contents($tempFilePath, '{"test_key":"test_value"}');
        return $tempFilePath;
    }
 

    public static function detectFolder(?string $folderPath) : bool {
        return isset($folderPath) && !empty($folderPath) && is_dir($folderPath) ? true : false;
    }

    public static function detectFile(?string $filePath) : bool {
        return isset($filePath) && !empty($filePath) && file_exists($filePath) ? true : false;
    }

    public static function isFileReadable(?string $filePath) : bool {
        return  !file_exists($filePath) && !is_readable($filePath)  ? false : true;
    }
    
    public static function updateFile(?string $filePath, $data) : bool {
        return (file_put_contents($filePath, $data) !== false) ? true : false;
    }

    public static function deleteFile(?string $filePath) : bool {
        return isset($filePath) && !empty($filePath) && file_exists($filePath) && unlink($filePath) ? true : false;
    }

    public static function readFile(?string $filePath) : string|false {
     return  isset($filePath) && !empty($filePath) && is_readable($filePath) ? file_get_contents($filePath)  : ( self::setError(500, "File {$filePath} is not readable") ? false : false );
    }

    private static function setError($level, $message) { 
        throw new \RuntimeException($message, $level);
    }
    

}