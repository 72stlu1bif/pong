<html>
<head>

<?php include ('config/db.php')?>
<?php include ('config/config.php')?>

<?php
if(isset($_GET['name'])) {
    $stmt = $pdo->prepare("INSERT INTO users (name)VALUES (:name)");
    $stmt->bindParam(':name', $name);
    $name = $_GET["name"];

  try {
    $stmt->execute();
  } catch (PDOException $e) {
    $e->getMessage();
  }
}
?>

<?php
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Name</th></tr>";

class TableRows extends RecursiveIteratorIterator {
  function __construct($it) {
      parent::__construct($it, self::LEAVES_ONLY);
  }

  function current() {
      return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
  }

  function beginChildren() {
      echo "<tr>";
  }

  function endChildren() {
      echo "</tr>" . "\n";
  }
}

try {
  // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $pdo->prepare("SELECT name FROM users");
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
      echo $v;
  }
}
catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
echo "</table>";
?>

</body>
</html>
