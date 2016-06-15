<?php

namespace CoreBundle\Infra;

interface ICrypto
{
    function Encrypt($plaintext);

    function Decrypt($encryptedtext);
}

class UniCrypto implements ICrypto
{
    function Decrypt($encryptedtext)
    {
        return $encryptedtext;
    }

    function Encrypt($plaintext)
    {
        return $plaintext;
    }
}

Interface IHashProvider
{
    function Hash($plaintext);
}

class UniHash
{
    function Hash($plaintext){
        
    }
}

?>