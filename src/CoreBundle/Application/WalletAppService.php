<?php 
#namespace UniTunes\Core\Application;
namespace CoreBundle\Application;

    class WalletAppService extends AppServiceBase
    {
        private $_factory; //CardOperatorFactory

        function __construct(EntityManager $entityManager)
        {
            parent::__construct($entityManager);
            $this->_factory = new CardOperatorFactory();
        }

        function AddCreditByCreditCard($userId, $cardNumber, $verificationCode, $name, $flag, $value)
        {
            $this->_factory->GetInstance($flag).Debit($name, $cardNumber, $verificationCode, $value);
            $wallet = GetOrCreateWallet($userId);
            $wallet->AddCredit($value);
            $this->databaseManager->flush();
        }

        function AddCreditByBoleto($barcode)
        {
            #throw new System.NotImplementedException();
        }

        function AddCreditTransfer($accountNumber, $agency)
        {
            #throw new System.NotImplementedException();
        }

        function GetOrCreateWallet($userId)
        {
            #$wallet = $this->_ctx->Wallets->FirstOrDefault($x => $x->Owner->Id == $userId);
            $wallet = null; //TODO: fazer a query acima
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