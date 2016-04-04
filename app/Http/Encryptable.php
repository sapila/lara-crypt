<?php 

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
    public function getAttributes(){
        $columsNames = parent::getAllColumnsNames();
        $attributes = parent::getAttributes();

        foreach ($attribute as $key => $value) {
            if (in_array($key, $this->encryptable)) {
            $attributes[$key] = Crypt::decrypt($value);
            }
        }

        return $attributes;



    }

    public function setAttribute($key, $value)
    {
        if (in_array($key, $this->encryptable)) {
            $value = Crypt::encrypt($value);
        }

        return parent::setAttribute($key, "nik");
    }
}