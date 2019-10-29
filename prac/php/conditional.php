<?php

    #CONDITIONALS

    /*
        ==
        ===
        <
        >
        <=
        >=
        !=
        !===
    */

    /*
        LOGICAL OPERATORS

        and &&
        or ||
        xor
    */

    $favorColor = 'red';

    switch ($favorColor)
    {
        case 'red':
            echo 'Your favourite color is red';
            break;
        case 'blue':
            echo 'Your favourite color is blue';
            break;
        case 'green':
            echo 'Your favourite color is green';
            break;
        case 'yellow':
            echo 'Your favourite color is yellow';
            break;
        default:
            echo 'Your favourite color is something else';
    }
?>