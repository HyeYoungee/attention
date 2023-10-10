<?php

    $hostname = 'localhost';
    $dbuserid = 'kcvey';
    $dbpasswd = 'gPdud152814!';
    $dbname = 'kcvey';

    $mysqli = new mysqli($hostname, $dbuserid, $dbpasswd, $dbname);

    if ($mysqli->connect_errno) {
    die('mysqli connection error: ' . $mysqli->connect_error);
    } 

?>