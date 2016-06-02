<?php

namespace CoreBundle\Infra;

    interface ICrypto
    {
        function Encrypt($plaintext);
        function Decrypt($encryptedtext);
    }

    class UnisinosCrypt implements ICrypto
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
?>