<?php
    class User{
        public $Name;
        public $Email;
        public $Password;
        public $Phone;
        public $Address;

        private function List(){
            echo "User list";
        }

        private function Add(){
            echo "User Add";
        }

        public function Edit(){
            echo "User Edit";
        }

        public function Register(){
            echo "User Register";
        }

        public function Login(){
            echo "User Login";
        }

        public function View(){
            echo "User View";
        }
    }
?>