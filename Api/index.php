<?php
include "./api/header.php";
include "./api/functions.php";
require "./rb/rb.php";
R::setup('mysql:host=localhost;dbname=DbName', 'userName', 'userPass'); //for both mysql or mariaDB//rb_pharmacy
//localhost", "dev_alley_user", "QCiU0JtVo4z557ZVQk=", "tryfel_db
R::freeze(true);
R::useJSONFeatures(TRUE);

// header('Content-type: json/aplication');
$recivedData = json_decode(file_get_contents("php://input"));
$fn = new Functions;
if (!R::testConnection()) {
  echo 'нет подключения';
} else {

  //code
 


}