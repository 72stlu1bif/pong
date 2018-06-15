
<?php
if(isset($_POST['name'])) {
  $a = array('name' => ($_POST['name']));
  echo json_encode($a);
} else {
  $a = array('error' => 'no text set');
  echo json_encode($a);
}
?>
