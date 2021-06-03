<?php

require_once __DIR__ . "/util.php";


// js 함수 테스트


// jsAlert("안녕하세요.");

// jsLocationReplaceExit("https://www.naver.com", "네이버로 이동합니다.");
// jsLocationReplaceExit("https://www.naver.com");

// jsHistoryBack("뒤로 이동합니다.");

// getIntValueOr(21, 0);

$loginId = "wayne10";
$loginPw = "wayne10";

$sql = DB__secSql();
$sql->add("select * from member where loginId = ? ", $loginId);
$sql->add("and loginPw = ?", $loginPw);


$member = DB__getRows2($sql);