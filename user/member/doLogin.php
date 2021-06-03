<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/webInit.php";


$loginId = $_POST['loginId'];
$loginPw = $_POST['loginPw'];

$sql = "select * from member where loginId = '{$loginId}'";

$member = DB__getRow($sql);

$_SESSION['loginedMemberId'] = $member['id'];