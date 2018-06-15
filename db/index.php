<?php include ('config/db.php')?>
<?php include ('config/config.php')?>
<?php
if(isset($_GET['name'])) {

  // $name = $_GET["name"];
  // $sql = "INSERT INTO users(name) VALUES()";
  // $stmt = $pdo->prepare($sql);
  // $stmt->execute();
  // $name = $_GET["name"];
  // $sql = "INSERT INTO users(name) VALUES("+$name+")";
  // $stmt = $pdo->prepare($sql);
  // $stmt = $pdo->prepare("INSERT INTO users(name) VALUES(?)");
  // $stmt->bind_param('s', $name);

  // $name = $_GET["name"];
  // prepare sql and bind parameters
    $stmt = $pdo->prepare("INSERT INTO users (name)VALUES (:name)");
    $stmt->bindParam(':name', $name);
    $name = $_GET["name"];

  try {
    $stmt->execute();
  } catch (PDOException $e) {
    $e->getMessage();
  }
  // $sql->bind_param($name);
  // $rowCount = $stmt->rowCount();
  // $details = $stmt->fetch();
  // print_r ($name);

  // $sql = 'SELECT * FROM users';
  // $stmt = $pdo->prepare($sql);
  // $stmt->execute();
  // $rowCount = $stmt->rowCount();
  // $details = $stmt->fetch();
}
?>

<html>
<head>
  <title>Heroku Test</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/index.css">
  <!-- <script src="https://code.jquery.com/jquery-latest.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="<?php echo ROOT_URL; ?>">Heroku Test</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li>
        <a class="nav-link" href="<?php echo ROOT_URL; ?>">Home</a>
      </li>
      <li>
        <a class="nav-link" href="<?php echo ROOT_URL; ?>about">About</a>
      </li>
      <li>
        <a class="nav-link" href="<?php echo ROOT_URL; ?>contact">Contact Us</a>
      </li>
    </ul>
      </div>
</nav>

<form id="guestbook-form" action ="<?php echo ROOT_URL; ?>" method="get">
      Name:<br>
      <input type="name" size="40" maxlength="250" name="name"><br><br>
      <input id="submit" type="submit" value="Send">
</form>
<!-- Result:
<div id="result"></div>
  <table id="table" name="table">
    <tr>
      <td>name</td>
    </tr>
  </table> -->

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
