<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/webInit.php";

$pageTitle = "로그인";
?>

<form name="loginfrm" method="POST" action="doLogin.php">
    <div>
        아이디 <input type="text" name="loginId">
        비밀번호 <input type="text" name="loginPw">
        <button type="button" onClick="loginfrm.submit()">로그인</button>
    </div>
</form>