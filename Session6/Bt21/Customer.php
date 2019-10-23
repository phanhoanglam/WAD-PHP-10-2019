<?php
    include 'User.php';
    class Customer extends User{
        public $DeliveryAddress;
        public $CustomerCode;

        public function Pay(){
            echo "Customer pay";
        }

        public function History(){
            echo "Customer history";
        }
    }

    $customer = new Customer();
    $customer->Register();
    echo '<br />';
    $customer->Pay();
?>