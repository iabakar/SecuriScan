<?php
ob_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $subnet = $_POST["subnet"];
  print_r($_POST);

  print($subnet);
  $output = exec("python SecuriScan/networkjson.py $subnet");
  echo $output;
}

?>
