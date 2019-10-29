<?php
/*
    //Check for posted
    if (filter_has_var(INPUT_POST, 'data'))
        echo 'Data Found';
    else 
        echo 'No Data Found';
  */  
    if (filter_has_var(INPUT_POST, 'data'))
    {
        $email = $_POST['data'];
        //Remove illegal chars
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        echo $email.'<br>';


        if (filter_input(INPUT_POST, 'data', FILTER_SANITIZE_EMAIL))
        {
            echo 'Email is valid';
        }
        else
        {
            echo 'Email is NOT valid';
        }

        if (filter_var($email, FILTER_SANITIZE_EMAIL))
            echo 'Email is valid';
        else
            echo 'Email is Not valid';
        // if (filter_input(INPUT_POST, 'data', FILTER_VALIDATE_EMAIL))
        //     echo 'Email is valid';
        // else
        //     echo 'Email is Not valid';

        #FILTER_VALIDATE_BOOLEAN;
        #FILTER_VALIDATE_EMAIL;
        #FILTER_VALIDATE_FLOAT;
        #FILTER_VALIDATE_INT;
        #FILTER_VALIDATE_IP;
        #FILTER_VALIDATE_REGEXP;
        #FILTER_VALIDATE_URL;

        #FILTER_SANITIZE_EMAIL;
        #FILTER_SANITIZE_ENCODED;
        #FILTER_SANITIZE_NUMBER_FLOAT;
        #FILTER_SANITIZE_NUMBER_INT;                    <-- Removes illegal chars
        #FILTER_SANITIZE_SPECIAL_CHARS;
        #FILTER_SANITIZE_STRING;
        #FILTER_SANITIZE_URL;

        // $var = 23;
        // if (filter_var($var, FILTER_VALIDATE_INT))
        // {
        //     echo $var.' is a number';
        // }
        // else
        // {
        //     echo $var.' is Not a number';
        // }

        // $var = '<script>alert(1)</script>';
        // echo filter_var($var, FILTER_SANITIZE_SPECIAL_CHARS);
        
        $filter = array(
            "data" => FILTER_VALIDATE_EMAIL,
            "data2" => array(
                "filter" => FILTER_VALIDATE_INT,
                "options" => array(
                    "min_range" => 1,
                    "max_range" => 100
                )
            )
        );
    }   
    print_r(filter_input_array(INPUT_POST, $filter));

    $arr = array(
        "name" => "brad traversy",
        "age" => "35",
        "email" => "brad@gmail.com"
    );

    $filter = array(
        "name" => array(
            "filter" => FILTER_CALLBACK,
            "options" => "ucwords"
        ),
        "age" => array(
            "filter" => FILTER_VALIDATE_INT,
            "options" => array(
                "min_range" => 1,
                "max_range" => 120
            )
        ),
        "email" => FILTER_VALIDATE_EMAIL
    );

    print_r(filter_var_array($arr, $filter));
?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <input type="text" name="data" id="">
    <input type="text" name="data2" id="">
    <button type="submit">Submit</button>
</form>