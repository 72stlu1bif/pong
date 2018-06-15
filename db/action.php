<?php
  //echo 'This is Index Page';

  $sql = 'SELECT * FROM users';
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $rowCount = $stmt->rowCount();
  $details = $stmt->fetch();

  print_r ($details);

  if(isset($_POST['name'])) {
    $name = $_POST["name"];
    $sql = 'INSERT INTO users (name) VALUES (?)';
    $sql->bind_param("s", $name);
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    // $rowCount = $stmt->rowCount();
    // $details = $stmt->fetch();
    try {
      $stmt->execute();
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }
?>
