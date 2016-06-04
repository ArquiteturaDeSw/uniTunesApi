<?php
namespace CoreBundle\Infra\Billing;
#require("/mnt/c/Users/trlth/gitrepository/uniTunesApi/uniTunesApi/src/CoreBundle/Entity/CardFlag.php");
use CoreBundle\Entity;


    interface ICardOperator
    {
        function Debit($name, $cardNumber, $verificationCode, $value);
        function Refund($name, $cardNumber, $verificationCode, $value);
    }

    class Visa implements ICardOperator
    {
        function Debit($name, $cardNumber, $verificationCode, $value)
        {
            #throw new NotImplementedException();
        }

        function Refund($name, $cardNumber, $verificationCode, $value)
        {
            #throw new NotImplementedException();
        }
    }

    class Master implements ICardOperator
    {
        function Debit($name, $cardNumber, $verificationCode, $value)
        {
            #throw new NotImplementedException();
        }

        function Refund($name, $cardNumber, $verificationCode, $value)
        {
            #throw new NotImplementedException();
        }
    }

    class CardOperatorFactory
    {
        function GetInstance( /*CardFlag*/ $flag) // : ICardOperator
        {
            switch ($flag)
            {
                case Entity\CardFlag::Visa:
                    echo "visa";
                    return new Visa();
                case Entity\CardFlag::Master:
                    echo "mater";
                    return new Master();
                default:
                    throw new InvalidArgumentException("Invalid Flag.");
            }
        }
    }
?>