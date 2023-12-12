<?php namespace PHPAssists\Shared\Core\ThirdParty\Stripe\Entity;
/**
 * PHPAssists Stripe API
 *
 * This class defines the possible Stripe API algo for the PHPAssists Stripe API.
 *
 * @link       https://hexome.com.ar
 * @link       https://hexome.cloud
 * @link       https://hexome.es
 * @since      0.0.5
 *
 * @package    PHPAssists
 * @subpackage PHPAssists\Shared\Core\ThirdParty\Stripe
 *
 * @author     Hexome Cloud <hi@hexome.cloud>
 * @link https://packagist.org/packages/juanma386/php-assists-class
 *
 */

class StripeEntity {
    private ?string $stripeApiKey;
    private ?string $currentDir = null;
    private ?string $filePath;
    private ?string $fileName;
    private ?string $file;
    
    
    
    public function __construct(?string $stripeApiKey,?string $currentDir) {
        $this->setCurrentDir($currentDir);
        $this->setKeySecret((string) $stripeApiKey);
    }

    private function inicializate() : void {
        $this->file = $this->currentDir . DIRECTORY_SEPARATOR . ($this->fileName ?? null);
    }

    private function getFile() : ?string {
        return $this->file;
    }

    public function getCurrentDir() : ?string {
        return $this->currentDir;
    }

    private function setCurrentDir(?string $currentDir) : void {
        if(!$this->getCurrentDir()) {
            $this->currentDir = $currentDir;
        }
    }

    private function getKeySecret() : ? string {
        return $this->stripeApiKey;
    }

    private function setKeySecret(?string $stripeApiKey) : void {
        $this->stripeApiKey = $stripeApiKey;
    }

    function verifyIdInCSV($paymentIntentId, ?string $filePath) : bool {
        $this->checkFileExistsAndCreateIfNotExists($filePath);
        $filePath = $this->getFile();
        // Open the file in read mode
        $file = fopen($filePath, 'r');

        // Iterate over each line in the CSV file
        while (($row = fgetcsv($file)) !== false) {
            // Compare the Payment Intent ID with the value of the first column in each row
            if ($row[0] === $paymentIntentId) {
                fclose($file);
                return true; // The Payment Intent ID was found
            }
        }

        fclose($file);
        return false; // The Payment Intent ID was not found
    }

    function storeJson($json) {
        // Convert the JSON to a PHP object
        $object = json_decode($json);

        // Iterate over the object's fields
        foreach ($object as $field => $value) {
            // Store the field in the object
            $object->{$field} = $value;
        }

        // Return the object
        return $object;
    }

    private function setFileName(?string $fileName) : void {
        $this->fileName = $fileName;
    }

    public function getFileName() : ?string {
        return $this->fileName;
    }

    function checkFileExistsAndCreateIfNotExists(?string $fileName) : void
    {
        $this->setFileName($fileName);
        $this->inicializate();
        $filePath = $this->getFile();
        if (!file_exists($filePath)) {
            touch($filePath);
        }
    }


    function removeDuplicates($string)
    {
        // Convertir el string a un array
        $array = explode('/', $string);

        // Eliminar los duplicados del array
        $array = array_unique($array, function ($value) {
            return !in_array($value, $array);
        });

        // Convertir el array de nuevo a un string
        $string = implode('/', $array);

        return $string;
    }

    function searchCustomer(?string $filePath,?string $customer_id) {
        // Open the file in read mode
        $this->checkFileExistsAndCreateIfNotExists($filePath);
        $filePath = $this->getFile();

        $file = fopen($filePath, 'r');
        

        // Iterate over the lines in the file
        while (($line = fgets($file)) !== false) {
            // Split the line into fields
            $fields = explode(',', $line);

            // Check if the customer field matches
            if ($fields[3] == $customer_id) {
                // Return the found fields
                return $fields;
            }
        }

        // Close the file
        fclose($file);

        // Return null if the customer field is not found
        return null;
    }


    function verifyExistenceFields(?string $filePath,?string $customer_id) {
        $this->checkFileExistsAndCreateIfNotExists($filePath);
        $filePath = $this->getFile();
        // Open the file in read mode
        $file = fopen($filePath, 'r');

        // Define a variable to check the existence of the fields
        $existeCampos = false;

        // Iterate over each line in the CSV file
        while (($row = fgetcsv($file)) !== false) {
            // Check if the line contains 'succeeded' and 'cus_'
            if (strpos($row[0], 'succeeded') !== false && strpos($row[2], $customer_id) === 0) {
                $existeCampos = true;
                break; // If found, stop the search
            }
        }

        fclose($file);

        return $existeCampos;
    }


    function storePaymentInCSV($paymentIntentJSON, ?string $filePath) : bool {
        $this->checkFileExistsAndCreateIfNotExists($filePath);
        $filePath = $this->getFile();
        if (isset($paymentIntentJSON) &&
        isset($paymentIntentJSON->status) &&
        isset($paymentIntentJSON->id) &&
        isset($paymentIntentJSON->customer) && isset($filePath)):
            $status = $paymentIntentJSON->status;
            $paymentId = $paymentIntentJSON->id;
            $customerId = $paymentIntentJSON->customer;
            $foundFields = [
                $status,
                $paymentId,
                $customerId,
            ];

            if(!$this->verifyExistenceFields($filePath,$customerId)) {
                // Open the file in write mode (if it does not exist, it creates it)
                $file = fopen($filePath, 'a');

                // Create a row for the CSV with the details of the Payment Intent
                $row = (array) $foundFields;

                // Write the row to the CSV file
                fputcsv($file, $row);
                return true;
                // Close the file
                fclose($file);
            } 
        endif;
        return false;
    }

    function compareWithPaymentIntents($fileName) : void
    {
        $this->checkFileExistsAndCreateIfNotExists($filePath);
        $filePath = $this->getFile();
        $file = fopen($fileName, 'r'); 

        $stripeApiKey = $this->getKeySecret();
        \Stripe\Stripe::setApiKey($stripeApiKey);

        $paymentIntents = \Stripe\PaymentIntent::all(['limit' => 100]); 

        while (($data = fgetcsv($file)) !== false) {
            $customer_id_file = $data[0]; 
            $email = $data[2]; 

            foreach ($paymentIntents as $paymentIntent) {
                $customer_id = $paymentIntent->customer;
                if ($customer_id === $customer_id_file ) {
                    $filePayments = "payments.txt";
                    $this->storePaymentInCSV($paymentIntent, $filePayments);    
                }
            }
        }

        fclose($file);
    }
}