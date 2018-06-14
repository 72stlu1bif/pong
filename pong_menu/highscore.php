<!DOCTYPE html>
<html>
<head> <title> Highscore </title>
<meta charset="UTF-8">
<html lang="de">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="styletwo.css">
</head>

<body bgcolor="#E6E6FA">
<center>
<br>
  <div><a href="index.html"><button type="button" class="btn btn-danger">Zurück zum Hauptmenü</button></a></div>
<br>
<?php
$db_link = mysqli_connect (
                     'localhost','root','','testdb');

$sql = "SELECT `Name`, `Highscore` FROM `highscore`";

$db_erg = mysqli_query( $db_link, $sql );
if ( ! $db_erg )
{
  die('Ungültige Abfrage: ' . mysqli_error());
}

echo '<div class="container"> <table class="table-bordered">'; // oder "table table-hover"?
echo "<thead> <tr> <th>Name</th><th>Highscore</th> </tr></thead>";
echo "<tbody>";

while ($zeile = mysqli_fetch_array( $db_erg, MYSQLI_ASSOC))
{
  echo "<tr>";
  echo "<td>". $zeile['Name'] . "</td>";
  echo "<td>". $zeile['Highscore'] . "</td>";
  echo "</tr>";
}
echo '</tbody> </table> </div>';
?>
</body>
</html>
