<?php
  $db = pg_connect("host=localhost port=5432 dbname=training user=postgres");
  $query = sprintf("SELECT * from coords WHERE " . strtolower($_POST['field']) . " = '%s'", $_POST['find']);

  $result = pg_query($query);
  echo '<h2>Results</h2>';
  while ($row = pg_fetch_array($result)){
    echo 'Primary key: ' .$row['id_key'];
    echo '<br /> Sitename: ' .$row['sitename'];
    echo '<br /> Description: '.$row['description'];
    echo '<br /> Site Id: '.$row['site_id'];
    echo '<br /> Visit: '.$row['visit'];
    echo '<br /> Created at: '.$row['created_at'];
    echo '<br /> Geom: '.$row['the_geom'];
    echo '<br />';
    echo '<br />';
  }

  echo "<a href='index.html'><< Back</a>";
  echo '</body></html>';

?>
