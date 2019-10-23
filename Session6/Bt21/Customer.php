<?php
    include 'User.php';
    class Customer extends User{
        public $DeliveryAddress;
        public $CustomerCode;

        public function Payout(){

        }

        public function History(){

        }
    }

    $customer = new Customer();
    $customer->Register();
    $customer->Payout();
?>