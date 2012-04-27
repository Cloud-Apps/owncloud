<?php
$services = getenv("VCAP_SERVICES");
$services_json = json_decode($services,true);
$mysql_config = $services_json["mysql-5.1"][0]["credentials"];

$AUTOCONFIG = array(
"installed" => false,
"adminlogin" => "admin@stackato.local",
"adminpass" => "changeme",
"directory" => "/app/app/data", 
"dbtype" => "mysql",
"dbname" => $mysql_config["name"],
"dbuser" => $mysql_config["user"],
"dbpass" => $mysql_config["password"],
"dbhost" => $mysql_config["hostname"],
"dbtableprefix" => "oc_"
);
?>
