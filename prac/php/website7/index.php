<?php

    $path = '/dir1/myfile.php';
    $file = 'file1.txt';
/*
    //This return a filename
    echo basename($path);

    // Return filename without ext
    echo basename($path, '.php');

    // Return the dir name from path
    echo dirname($path);
*/
    
    //Check if file exit
    echo file_exists($file);

    // Get abs path <==== gets the whole path
    echo realpath($file);


    // Checks if it is a file <------ also a folder/dir
    echo is_file($file); 

    // Check if writable
    echo is_writeable($file);

    // Check if readbable
    echo is_readable($file);

    // Get file size
    echo filesize($file);

    // Craete a directory
    mkdir('testing');

    // Remove dir if empty
    rmdir('testing');

    // Copy file
    echo copy('file1.txt', 'file2.txt');

    // Rename a file
    rename('file2.txt', 'myfile.txt');

    // Delete file
    unlink('myfile.txt');

    //Write from file to string
    echo file_get_contents($file);

    // Write string to file
    echo file_put_contents($file, "Goodbye World");
    $current = file_get_contents($file);
    $current .= " Goodbye World";
    echo file_put_contents($file, $current);

    // /Open file for reading
    $handle = fopen($file, 'r');
    $data = fread($handle, filesize($file));
    echo $data;

    // Open file for writing
    $handle = fopen($file, 'w');
    $txt = "John Doe\n";
    fwrite($handle, $txt);
    fclose($handle);
?>