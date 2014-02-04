<?php
$db = pg_connect("host=localhost port=5432 dbname=training user=postgres");

$lat = $_POST[latitude];
$long = $_POST[longitude];
$wkt = sprintf("SRID=4326;POINT(%s %s)",$long, $lat);
$query = sprintf("INSERT INTO coords (sitename, description, site_id, visit, created_at, the_geom, latitude, longitude) 
  VALUES ('$_POST[sitename]','$_POST[description]','$_POST[site_id]','$_POST[visit]','$_POST[created_at]',GeomFromEWKT('%s'),'$lat','$long')",$wkt);

$insert = pg_query($query);

$query = 'select * from coords';
$result = pg_query($query);

   while ($row = pg_fetch_array($result)){
    echo 'Primary key: ' .$row['id_key'];
    echo '<br /> Sitename: ' .$row['sitename'];
    echo '<br /> Description: '.$row['description'];
    echo '<br /> Site Id: '.$row['site_id'];
    echo '<br /> Created at: '.$row['created_at'];
    echo '<br /> Visit: '.$row['visit'];
    echo '<br /> Visit: '.$row['the_geom'];
    echo '<br /> Latitude: '.$row['latitude'];
    echo '<br /> Latitude: '.$row['longitude'];
    echo '<br />';
    echo '<br />';
  }

echo '</body></html>';
echo "<a href='index.html'><< Back</a>"

?>
