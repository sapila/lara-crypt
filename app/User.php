<?php
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Config;
use Crypt;

class User extends Authenticatable
{
    use Encryptable;



    public $encryptable = [
        'password','address','name'
    ];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

   public function getEncryptable()
    {
        return $this->encryptable;
    }
    
    public static function boot()
    {
        parent::boot();

        //when creating user
        User::creating(function($user){
            //generate random key
            $recordKey = str_random(32);
            $newEncrypter = new \Illuminate\Encryption\Encrypter( $recordKey , Config::get( 'app.cipher' ) );
            //encrypt the encryptables with that key
           foreach ($user->getEncryptable() as $key ) {
               $value = $user->$key;
               $user->$key = $newEncrypter->encrypt( $value );
           }
           
            //$user->email = $recordKey;
           $baseEncrypter = new \Illuminate\Encryption\Encrypter( Config::get('app.key') , Config::get( 'app.cipher' ) );
           //store the generated record encryption key after encrypting in with the app key
            $user->recordencryptionkey = $baseEncrypter->encrypt($recordKey);
            //$user->email = $baseEncrypter->decrypt($user->recordencryptionkey);
        });

    }

}
