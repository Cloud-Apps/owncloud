<?php
$services = getenv("VCAP_SERVICES");
$services_json = json_decode($services,true);
$mysql_config = $services_json["mysql-5.1"][0]["credentials"];

define("DEBUG", true);

$CONFIG = array(
"installed" => true,
"dbtype" => "mysql",
"dbname" => $mysql_config["name"],
"dbuser" => $mysql_config["user"],
"dbpassword" => $mysql_config["password"],
"dbhost" => $mysql_config["hostname"],
"dbtableprefix" => "",
"forcessl" => false,
"enablebackup" => false,
"theme" => "",
"3rdpartyroot" => "",
"3rdpartyurl" => "",
"knowledgebaseenabled" => true,
"knowledgebaseurl" => "",
"appstoreenabled" => true,
"appstoreurl" => "",
"mail_smtpmode" => "sendmail",
"mail_smtphost" => "127.0.0.1",
"mail_smtpauth" => "false",
"mail_smtpname" => "",
"mail_smtppassword" => "",
"appcodechecker" => "",
"log_type" => "",
"logfile" => "/app/app/oc.log",
"loglevel" => "DEBUG",
);
?>
