<?php
/**
 * Created by PhpStorm.
 * User: Rahat
 * Date: 1/19/2018
 * Time: 4:10 PM
 */



/**
 * using mysqli_connect
 */

$databaseHost = 'localhost';
$databaseName = 'cms';
$databaseUsername = 'root';
$databasePassword = '';

$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

/*
if ($conn){
    echo "Connected";
}else{
    echo "Connection Error";
}*/

?>
