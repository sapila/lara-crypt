<?php 
namespace App;

use Crypt;
use Config;
use \Illuminate\Encryption\DecryptException;

trait Encryptable
{
   
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);
           
        if (in_array($key, $this->encryptable)) {
            try{    
                $cryptedKey = parent::getAttribute('recordencryptionkey');
                $baseEncrypter = new \Illuminate\Encryption\Encrypter( Config::get('app.key') , Config::get( 'app.cipher' ) );
                $cleanKey = $baseEncrypter->decrypt($cryptedKey);            
               
                $newEncrypter = new \Illuminate\Encryption\Encrypter( $cleanKey , Config::get( 'app.cipher' ) );
                $value = $newEncrypter->decrypt($value);
            }
            catch (\Exception  $e){
                $value = parent::getAttribute($key);
            }
            
        }

        return $value;
    }

}