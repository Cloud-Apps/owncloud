<?php
$services = getenv("VCAP_SERVICES");
$services_json = json_decode($services,true);
$mysql_config = $services_json["mysql-5.1"][0]["credentials"];

$AUTOCONFIG = array(
"installed" => true,
"adminlogin" => "admin",
"adminpass" => "changeme",
"directory" => "/app/app/data" 
);
?>
