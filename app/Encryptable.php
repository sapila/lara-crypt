<?php 
namespace App;

use Crypt;
use Config;

trait Encryptable
{
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        if (in_array($key, $this->encryptable)) {
            $value = Crypt::decrypt($value);
        }

        return $value;
    }

    public function setAttribute($key, $value)
    {
        if (in_array($key, $this->encryptable)) {
            $newEncrypter = new \Illuminate\Encryption\Encrypter( "wedgsgbsdr4bey57ere5y7beyb75eb7s" , Config::get( 'app.cipher' ) );
            $encrypted = $newEncrypter->encrypt( $value );
            $decrypted = $newEncrypter->decrypt( $encrypted );
            $value = Crypt::encrypt($value);
        }

        return parent::setAttribute($key, $value);
    }
}