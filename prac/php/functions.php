<?php 

    #Function - Block of block that can be repeatedly called

    /*
        Camel Case - myFunction();
        Lower Case - my_function();
        Pscal Case - MyFunction();
    */

    // Create simple function
    function simpleFunction()
    {
        echo "Hello World";
    }
    //Run simple function
    simpleFunction();

    //Function with param
    function sayHello($name = "world")
    {
        echo "Hello $name <br>";
    }
    sayHello("Joe");
    sayHello("Bob");
    // ===========================================================
    function addNumber($num1, $num2)
    {
        return $num1 +$num2;
    }
    echo addNumber(2,3);
    // Passing By Reference
    $myNum = 10;

    function addFive($num)
    {
        $num += 5;
    }

    function addTen(&$num)
    {
        $num += 10;
    }

    addFive($myNum);

    echo "Value: $myNum<br>";
    addTen($myNum);
    echo "Value: $myNum<br>";
?>