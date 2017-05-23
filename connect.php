<?php

$serverName = "WIN-OOCF35C9EBG\SQLEXPRESS";
$connectionInfo = array("Database"=>"carclass_work", "UID"=>"sa", "PWD"=>"Alu.2361");

$conn = sqlsrv_connect($serverName, $connectionInfo);

if( $conn ) {
     //echo "Connection established.<br />";
}else{
    // echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}			