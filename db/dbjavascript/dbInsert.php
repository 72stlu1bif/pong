<!-- db in und output -->

<?php

// $databasename = "mm8s_72stal1bif"; //Your db name
// $user = 'mm8s_72stal1bif';
// $password = 'bitteaendern';
// $db = 'mm8s_72stal1bif';
// $host = '193.196.143.168';
// $conn = new mysqli($host, $user, $password, $db);
$host = "ec2-50-19-224-165.compute-1.amazonaws.com";
$user = "crerhakuqdpmsx";
$password = "b00e4a167365632a163401099a6255ff1360aaf2575aff80a91fd079b8baf1b8";
$dbname = "dattp3t2ffreur";
$port = "5432";
$conn = new mysqli($host, $user, $password, $dbname, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
echo"\n";
$stmt = $conn->prepare("INSERT INTO users (name) VALUES (?)");
$name= $_POST['name']; // Fetching Values from URL
$stmt->bind_param("s", $name);
try {
  $stmt->execute();
} catch (PDOException $e) {
  $e->getMessage();
}
echo"\n";
echo "Data Submitted succesfully";
// $stmt = $conn->prepare("SELECT * from users");
//
// try {
//     $stmt->execute();
// } catch (PDOException $e) {
//     $e->getMessage();
// }
//
// $result = $stmt->get_result();
// while ($row = $result->fetch_assoc()) {
//   echo "<br>";
//     printf ("%s\n", $row["NAME"]);
// }
 ?>
