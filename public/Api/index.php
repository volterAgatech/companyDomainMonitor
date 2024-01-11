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
  if ($recivedData->action == 'getAllDomainData') {

    echo json_encode($whois->getAllDomainData($recivedData->limit));
  }
  $whois->test2('xn--73-6kchf2awx.xn--p1ai');
}