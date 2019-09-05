<?php

$host = "172.17.0.2";
$user ="root";
$password="test123";
$dbname="LuxHome";

$con = mysqli_connect($host,$user,$password,$dbname);

if (!$con) {
  die("Connection Failed: ".mysqli_connect_error());
}
