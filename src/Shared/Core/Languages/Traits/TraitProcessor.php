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
        
        $client_lang = getDefaultLanguage();
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
        $fileName =  DIRECTORY_SEPARATOR . $language_code . '.json'; // Nombre del archivo
        $filePath = self::$ROOTPATH . $fileName; // Ruta completa del archivo

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
            $folderPath = dirname($filePath);
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
        self::$language_code = strtolower($language_code);
        $newLangFile = self::$ROOTPATH . DIRECTORY_SEPARATOR . self::$language_code . '.json';
        if (!file_exists($newLangFile)) {
            if (!file_exists(dirname($newLangFile))) {
                mkdir(dirname($newLangFile), 0777, true);
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
        self::$language_code = strtolower($language_code);
        $deleteLangFile = self::$ROOTPATH . DIRECTORY_SEPARATOR . self::$language_code . '.json';
        
        if (file_exists($deleteLangFile)) {
            unlink($deleteLangFile);
            return true; // El archivo existía y fue eliminado
        } else {
            return false; // El archivo no existía
        }
    }
    


    private static function inicializate(?string $language_code): void {
        if (isset($language_code) && !empty($language_code)) 
            { self::$language_code = strtolower($language_code); } 
        else 
            { self::$language_code = strtolower(LangEnum::en->value); }
            
            $fileName = self::$language_code;
            self::setFileName($fileName);
            $filePath = self::$APPPATH .  DIRECTORY_SEPARATOR . strtolower(self::getFileName()); 
            self::setFilePath($filePath);
            $folderPath = self::getFilePath();
            
            $filePath = $folderPath .  DIRECTORY_SEPARATOR . self::getFileName();

        touch($filePath);
        self::createDirectoryIfNotExists((string) $folderPath);
        self::createFileIfNotExist((string)$filePath, '{}');
    }
    
    function setROOTPath( ? string $ROOTPATH) : void {
        if ($ROOTPATH)
        self::$ROOTPATH = $ROOTPATH;
    }



    function get_phrase($phrase = '', $p = false) {

		if ( !isset($language_code)){ 
			try {
				foreach ((new \App\Models\SettingModel())->findAll() as $row) { 
					if ($row["type"] == "language"):
						self::$language_code = $row["description"]; 
					endif;
				}
			} catch (\Throwable $th) {
				//throw $th;
				self::$language_code = "spanish"; 

			}
			
        }
		//$client_language = json_decode($json_data[$client_language], true);
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
        return (
            [
                self::setFileName($language_code),
                $filePath = self::$APPPATH .  DIRECTORY_SEPARATOR . strtolower(self::getFileName()),
                self::setFilePath($filePath),
                $jsonString = self::readFile(self::getFilePath()),
            ]
        ) ? ( json_decode($jsonString, true) ?: [] ) : [];
    }
 
/*-
    function openJSONFile($language_code)
	{
		$jsonString = [];
		if (file_exists(self::$ROOTPATH . $language_code.'.json')) {
			$jsonString = file_get_contents(self::$ROOTPATH . DIRECTORY_SEPARATOR . $language_code . '.json');
			$jsonString = json_decode($jsonString, true);
		}
		return $jsonString;
	}
*/

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
     return  isset($filePath) && !empty($filePath) && !is_readable($filePath) ? ( throw new RuntimeException("File {$filePath} is not readable") ? false : false ) : file_get_contents($filePath);
    }

}