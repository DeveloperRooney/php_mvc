<?php

require_once __DIR__ . "/webInit.php";

$sql = "select * from user";

$array = DB__getRows($sql);

foreach($array as $data) {
    echo $data['userId']. "<br>";
}