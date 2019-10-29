<?php
    /*
    
        for
        while
        do..while 
        foreach
    */
    #for Loops
    for ($i = 0; $i < 10; $i++)
    {
        echo "Number",$i;
        echo "<br>";
    }
    #while loops
    $i = 0;
    while ($i < 10)
    {
        echo $i;
        echo "<br>";
        $i++;
    }
    #do.. while loops
    $i = 0;
    do 
    {
        echo $i;
        echo "<br>";
        $i++;
    }while ($i < 10);
    
    $people = array("Brad", "William", "Jose");
    foreach ($people as $person)
    {
        echo $person;
        echo "<br>";
    }

    $people = array("Brad" => 'brad@gmail.com' , "William" => 'william@gmail.com' , "Jose" => 'jose@gmail.com');

    foreach ($people as $person => $email)
    {
        echo $person." ".$email;
        echo "<br>";
    }
?>