<?php

    echo date('d'); //Number of the Day
    echo date('m'); //Number of the Month
    echo date('Y'); //Number of the Year
    echo date('l'); //Day of the week

    echo date('Y/m/d'); // <=====format of the date
    echo date('m-d-Y'); // <=====format of the date

    echo date('h'); //hour
    echo date('i'); //Min
    echo date('s'); //Seconds
    echo date('a'); //AM or PM

    //SET TIME Zone
    date_default_timezone_get('Africa/Johannesburg');
    echo date('h:i:sa');


    /*
    Unix timestamo is a long integer containing the number of 
    seconds between the Unix Epoch (January 1 1970 00:00:00 GMT)
    and the time specified
    */

    $timestamp = mktime(10, 14, 54, 9, 10, 1994);
    echo $timestamp;

    echo date('m/d/Y h:i:sa', $timestamp);

    $timestamp2 = strtotime('7:00pm March 22 2016');
    $timestamp3 = strtotime('tomorrow');
    $timestamp4 = strtotime('next Sunday');
    $timestamp5 = strtotime('+2 Months');
    echo $timestamp2;

    echo date('m/d/Y h:i:sa', $timestamp2);
    echo date('m/d/Y h:i:sa', $timestamp5);
?>