<?php
  $db = pg_connect("host=localhost port=5432 dbname=training user=postgres");
  $field = strtolower($_POST['queryfield']);
  $query = 'SELECT * FROM coords WHERE '.$field.' = $1';
  $params = $_POST['find'];

  $result = pg_query_params($db, $query, array($params));

  $rows = array();
  while($r = pg_fetch_assoc($result)) {
    $rows[] = $r;
  }
  echo json_encode($rows);

  echo '</br>';
  echo '</br>';
  echo "<a href='index.html'><< Back</a>";

?>
