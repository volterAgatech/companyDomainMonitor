<?php
include "./api/header.php";
include "./api/WhoisData.php";
require "./rb/rb.php";
require "./phpWhois/src/whois.main.php";
R::setup('mysql:host=localhost;dbname=domainmonitor', 'root', 'root');
R::freeze(true);
R::useJSONFeatures(TRUE);

// header('Content-type: json/aplication');
$recivedData = json_decode(file_get_contents("php://input"));
$whois = new WhoisData;
if (!R::testConnection()) {
  echo 'нет подключения';
} else {
  $whois->getAllDomainInfo();
  //code
}