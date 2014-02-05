<?php
$db_connection = pg_connect("host=localhost port=5432 dbname=training user=postgres");

$lat = $_POST['latitude'];
$long = $_POST['longitude'];

// %f will format 34 to 34.000000 and arbitrary strings to 0.00000
$wkt = sprintf("GeomFromEWKT('SRID=4326;POINT(%f %f)')",$long, $lat);

$geom = pg_escape_string($wkt);

$query = 'INSERT INTO coords (sitename, description, site_id, visit, created_at, the_geom, latitude, longitude)
  VALUES ($1, $2, $3, $4, $5, $6, $7, $8)';

$params = array($_POST['sitename'],$_POST['description'],$_POST['site_id'],
  $_POST['visit'],$_POST['created_at'],$wkt,'12.3232','143.3423');

$insert = pg_query_params($db_connection, $query, $params);

$query = 'select * from coords';
$result = pg_query($query);

$rows = array();
while($r = pg_fetch_assoc($result)) {
  $rows[] = $r;
}
echo json_encode($rows);

echo '</br>';
echo '</br>';
echo "<a href='index.html'><< Back</a>";

?>
