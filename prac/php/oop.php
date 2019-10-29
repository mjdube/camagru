<?php

    class Person
    {
        private $name;
        private $email;
        private static $ageLimit = 40; 
        // public static $ageLimit = 40; 

        public function __construct($name, $email)
        {
            $this->name = $name;
            $this->email = $email;
            echo __CLASS__.' created';
        }

        public function __detruct()
        {
            echo __CLASS__.' destroyed<br>';
        }

        public function setName($name)
        {
            $this->name = $name;
        }

        public function getName()
        {
            return ($this->name.'<br>');
        }

        public function setEmail($email)
        {
            $this->name = $email;
        }


        public function getEmail()
        {
            return ($this->email.'<br>');
        }

        public static function getAgeLimit()
        {
            return self::$ageLimit;
        }
    }

    # Static Props and functions/Methods
    echo Person::$ageLimit;
    echo Person::getAgeLimit();
    
    

    // $person1 = new Person("Mlungisi Dube", "mj@gmail.com");   
    // // $person1->name = "Mlungisi Dube";

    // $person1->setName("Mlungisi Dube");
    // echo $person1->getName();

    class Customers extends Person
    {
        private $balance;

        public function __construct($name, $email, $balance)
        {
            parent::__construct($name, $email, $balance);
            $this->balance = $balance;
            echo 'A new'.__CLASS__.' has been created<br>';
        }

        public function setBalance($balance)
        {
            $this->balance = $balance;
        }


        public function getBalance()
        {
            return ($this->balance.'<br>');
        }
    }

    echo Person::$ageLimit;
    // $customer1 = new Customers("Mlungisi Dube", "mj@gmail.com", 300);

    // echo $customer1->getBalance();
?>