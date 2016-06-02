<?php

namespace CoreBundle\Application;

use CoreBundle\Infra;
use CoreBundle\Repository\UnisinosCrypt;


 class UserAppService
    {
        private $_ctx;
        private $_crypto;
        
        function __construct(/*$ctx*/)
        {
            #$this->_ctx = $ctx;
            $this->_ctx = new UserRepository();
            $this->_crypto = new UnisinosCrypt();
        }

        function Create($name, $email, $password)
        {
            $this->_ctx->Users->Add(new User($name, $email, $this->_crypto->Encrypt($password)));
            $this->_ctx->SaveChanges();
        }

        function GetById($id)
        {
            return $this->_ctx->Users->Find($id);
        }

        function GetUserByCredentials($email, $password)
        {
            $securePassword = $this->_crypto->Encrypt($password);

            $user = null; //TODO: descobrir como que faz o FirstOrDefault()
            //$user = $this->_ctx->Users->FirstOrDefault(x => x->Email == $email && password == $securePassword);

            if ($user == null)
                throw new Exception("User not found");
            else if ($user->Status == UserStatus::Deactivated)
                throw new Exception("User disabled");

            return $user;
        }

        function Edit($id, $name, $email)
        {
            $user = $this->_ctx->Users->Find($id);
            $user->Name = $name;
            $user->Email = $email;
            $this->_ctx->SaveChanges();
        }

        function Delete($id)
        {
            $user = $this->_ctx->Users->Find($id);
            $user->Deactivate();
            $this->_ctx->SaveChanges();
        }

        function GetMedias($userId)
        {
            $user = $this->_ctx->Users->Find($userId);
            if ($user == null) return array();
            //return $user->Purchases->Select(x => x->Media)->ToList();
            //TODO: descobrir como que faz Select()
        }
 }

?>