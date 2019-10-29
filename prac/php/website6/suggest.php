<?php

    $peaple[] = "Mlungisi";
    $peaple[] = "Mpumelelo";
    $peaple[] = "Mandi";
    $peaple[] = "Kamogelo";
    $peaple[] = "Max";
    $peaple[] = "Katlego";
    $peaple[] = "Devon";
    $peaple[] = "Isaac";
    $peaple[] = "Nape";
    $peaple[] = "Sunday";
    $peaple[] = "Zaid";
    $peaple[] = "Boinahano";
    $peaple[] = "Bokgabane";
    $peaple[] = "Gontse";
    $peaple[] = "Lazola";
    $peaple[] = "Zakhele";
    $peaple[] = "Nhlanhla";
    $peaple[] = "Ayanda";
    $peaple[] = "Star";
    $peaple[] = "George";
    $peaple[] = "Bryan";
    $peaple[] = "Donald";
    $peaple[] = "Mike";
    $peaple[] = "Greg";
    $peaple[] = "Lebo";
    $peaple[] = "Kagiso";
    $peaple[] = "Katlego";
    $peaple[] = "Bongani";
    $peaple[] = "Zulu";
    $peaple[] = "Paul";
    $peaple[] = "Thabiso";
    $peaple[] = "Brad";
    $peaple[] = "Rogger";

    // GET Query String
    $q = $_REQUEST['q'];

    $suggestion = "";

    // GET Suggestions
    if ($q !== "")
    {
        $q = strtolower($q);
        $len = strlen($q);
        foreach ($people as $person)
        {
            if (stristr($q, substr($person, 0, $len)))
            {
                if ($suggestion === "")
                {
                    $suggestion = $person;
                }
                else
                {
                    $suggestion .= ", $person";
                }
            }

        }
    }

    echo $suggestion === "" ? "No Suggestion" : $suggestion;

?>