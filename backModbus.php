<?php

if(isset($_GET["ind"]) & isset($_GET["activeEn"]) & isset($_GET["passiveEn"])) {

    $table = $_GET["ind"];
    $activeEn = $_GET["activeEn"];
    $passiveEn = $_GET["passiveEn"];
    
    $server = "localhost";          // mysql server address
    $user = "";                     // mysql username
    $passwd = "";                   // mysql password
    $db = "";                       // database name
    
    $connection = new mysqli($server, $user, $passwd, $db);

    if ($connection -> error){
        die("CONNECTION FAILED:\t" . $connection -> connect_error);
    }

    $sql = "INSERT INTO $table (DateTime, ActiveEnergy, PassiveEnergy) VALUES (NOW(), $activeEn, $passiveEn)";
    $result = $connection -> query($sql);

    if (!$result){
        echo "INVALID QUERY:\t" . $connection -> error;
    } else {
        echo "Data added succesfully";
    }

    $connection -> close();

} else {
    echo "Parameters not set.\n";
}   

?>
