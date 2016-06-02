<?php 
namespace UniTunes\Core\Application;

    class WalletAppService
    {
        private $_ctx;
        private $_factory; //CardOperatorFactory

        function __construct($ctx)
        {
            $this->_ctx = $ctx;
            $this->_factory = new CardOperatorFactory();
        }

        function AddCredit($userId, $cardNumber, $verificationCode, $name, $flag, $value)
        {
            $this->_factory->GetInstance($flag).Debit($name, $cardNumber, $verificationCode, $value);
            $wallet = GetOrCreateWallet($userId);
            $wallet->AddCredit($value);
            $this->_ctx.SaveChanges();
        }

        function AddCredit($barcode)
        {
            throw new System.NotImplementedException();
        }

        function AddCredit($accountNumber, $agency)
        {
            throw new System.NotImplementedException();
        }

        function GetOrCreateWallet($userId)
        {
            $wallet = $this->_ctx->Wallets->FirstOrDefault($x => $x->Owner->Id == $userId);
            if ($wallet == null)
            {
                $user = $this->_ctx->Users->Find($userId);
                $wallet = new Wallet($user);
                $this->_ctx->Wallets->Add($wallet);
            }

            return $wallet;
        }
    }

?>