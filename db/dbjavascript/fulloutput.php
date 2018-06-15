<?php
$databasename = "mm8s_72stal1bif"; //Your db name
$user = 'mm8s_72stal1bif';
$password = 'bitteaendern';
$db = 'mm8s_72stal1bif';
$host = '193.196.143.168';
$conn = new mysqli($host, $user, $password, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
echo"\n";
$stmt = $conn->prepare("SELECT * from userverwaltung");

try {
    $stmt->execute();
} catch (PDOException $e) {
    $e->getMessage();
}

$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
  echo "<br>";
    printf ("%s\n", $row["VORNAME"]);
    printf ("%s\n", $row["NACHNAME"]);
    printf ("%s\n", $row["EMAIL"]);
  }
  ?>
