<?php
$services = getenv("VCAP_SERVICES");
$appinfo = getenv("VCAP_APPLICATION");
$services_json = json_decode($services,true);
$appinfo_json = json_decode($appinfo,true);
$mysql_config = $services_json["mysql-5.1"][0]["credentials"];

$AUTOCONFIG = array(
"installed" => false,
"adminlogin" => $appinfo_json["users"][0],
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
