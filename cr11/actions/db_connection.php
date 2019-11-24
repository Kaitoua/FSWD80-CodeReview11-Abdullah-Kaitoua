<?php

error_reporting( ~E_DEPRECATED & ~E_NOTICE );


define ('URL', '127.0.0.1');
define('USER', 'root');
define('DB_PASS', '');
define ('DB_NAME', 'cr11_abdullah_kaitoua_travelmatic');

$conn = mysqli_connect(URL,USER,DB_PASS,DB_NAME);


if  ( !$conn ) {
 die("Connection failed : " . mysqli_error());
}


?>