<?php

    interface ICardOperator
    {
        function Debit($name, $cardNumber, $verificationCode, $value);
        function Refound($name, $cardNumber, $verificationCode, $value);
    }

    class Visa implements ICardOperator
    {
        function Debit($name, $cardNumber, $verificationCode, $value)
        {
            throw new NotImplementedException();
        }

        function Refound($name, $cardNumber, $verificationCode, $value)
        {
            throw new NotImplementedException();
        }
    }

    class Master implements ICardOperator
    {
        function Debit($name, $cardNumber, $verificationCode, $value)
        {
            throw new NotImplementedException();
        }

        function Refound($name, $cardNumber, $verificationCode, $value)
        {
            throw new NotImplementedException();
        }
    }

    class CardOperatorFactory
    {
        public ICardOperator GetInstance(CardFlag flag)
        {
            switch (flag)
            {
                case CardFlag.Visa:
                    return new Visa();
                case CardFlag.Master:
                    return new Master();
                default:
                    throw new ArgumentOutOfRangeException(nameof(flag));
            }
        }
    }
?>