
<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <script src="bessereScripty.js" type="text/javascript"></script>
    <!-- <script src="dbOutput.js" type="text/javascript"></script> -->
    <script src="https://code.jquery.com/jquery-latest.js"></script>
  </head>
  <body>
    <form id="guestbook-form" action="?login=1" method="post">
      Vorname:<br>
      <input type="vorname" size="40" maxlength="250" name="vorname"><br><br>
      Nachname:<br>
      <input type="nachname" size="40"  maxlength="250" name="nachname"><br><br>
      E-mail:<br>
      <input type="email" size="40"  maxlength="250" name="email"><br><br>
      <input id="submit" type="submit" value="Abschicken">
    </form>
    Result:
    <div id="result"></div>
    <table id="table" name="table">
      <tr>
        <td>Vorname</td>
        <td>Nachname</td>
        <td>email</td>
      </tr>
    </table>
  </body>
</html>
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
