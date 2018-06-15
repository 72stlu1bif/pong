<?php

$host = "ec2-50-19-224-165.compute-1.amazonaws.com";
$user = "crerhakuqdpmsx";
$password = "b00e4a167365632a163401099a6255ff1360aaf2575aff80a91fd079b8baf1b8";
$dbname = "dattp3t2ffreur";
$port = "5432";

try{
  //Set DSN data source name
    $dsn = "pgsql:host=" . $host . ";port=" . $port .";dbname=" . $dbname . ";user=" . $user . ";password=" . $password . ";";


  //create a pdo instance
  $pdo = new PDO($dsn, $user, $password);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
echo 'Connection failed: ' . $e->getMessage();
}
  ?>
