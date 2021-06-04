<?php

require_once __DIR__ . "/webInit.php";


// js 함수 테스트


// jsAlert("안녕하세요.");

// jsLocationReplaceExit("https://www.naver.com", "네이버로 이동합니다.");
// jsLocationReplaceExit("https://www.naver.com");

// jsHistoryBack("뒤로 이동합니다.");

// getIntValueOr(21, 0);



$sql = DB__secSql();
$sql->add("select * from member");
$sql->add("and userPass = ?");


$members = DB__getRows($sql);

foreach ($members as $member) {
    echo $member ."<br>";
}