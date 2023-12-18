<?php 
namespace PHPAssists\Shared\Entities; 

/**
 * PHPAssists Feature Catalogue Entity
 *
 * This class represents individual feature catalogue within the PHPAssists framework.
 * It manages information related to feature catalogue used by the system.
 *
* @link       https://hexome.com.ar
 * @since      0.0.5
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Entities
 * @author     Hexome Cloud <hi@hexome.cloud>
 * @link https://packagist.org/packages/juanma386/php-assists-class
 *
 */

 class FeatureCatalogue
{
    private $featureProfiles = [];
        
    private $status = ["Active","Inactive"];
    private $status_default = "Inactive";
    private $status_true = "Inactive";

    public function addFeatureProfile($featureName, $featureArray, $createdAt, $userId, bool $status = false)
    {
        // Crear un nuevo perfil de funcionalidad como un array asociativo
        $newProfile = [
            'name' => $featureName,
            'array' => $featureArray,
            'created_at' => $createdAt,
            'user_id' => $userId,
            'status' => $status ? $this->status_true : $this->status_default
        ];

        $this->featureProfiles[] = $newProfile;
    }

    public function getFeatureProfiles()
    {
        return $this->featureProfiles;
    }

    
    public static function decodeJsonAtIndexOne(array $data): array
    {
        foreach ($data as $key0 => &$value0) {
            foreach ($value0 as $key1 => &$value1) {
                if ($key1 == 1) {
                    $decodedValue = json_decode($value1, true); // Decodificar el valor JSON
                    if ($decodedValue !== null) {
                        $value1 = $decodedValue; // Actualizar el valor en el arreglo original
                    }
                }
            }
        }

        return $data; // Retornar el arreglo modificado
    }
    
    // ...
}
