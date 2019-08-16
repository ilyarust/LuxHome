<?php

$host = "localhost:3306";
$user ="rustaily_LuxHome";
$password="58BjkqAB64X7CHm";
$dbname="rustaily_LuxHome";

$con = mysqli_connect($host,$user,$password,$dbname);

if (!conn) {
  die("Connection Failed: ".mysqli_connect_error());
}
