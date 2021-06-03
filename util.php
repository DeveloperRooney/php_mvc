<?php

class DB__SeqSql {
    private string $templateStr = "";
    private array $params = [];
    
    public function add(string $sqlBit, string $param = null) {
        $this->templateStr .= " " . $sqlBit;

        if ($param) {
            $this->params[] = $param;
        }
    }

    public function getTemplate() : string {
        return $this->templateStr;
    }

    public function getForBindParam1stArg() : string {
        $paramTypesStr = "";

        $count = count($this->params);

        for ($i = 0; $i < $count; $i++ ) {
            $paramTypesStr .= "s";
        }

        return $paramTypesStr;
    }

    public function getParams() : array {
        return $this->params;

    }
}

function DB__getRow($sql) {

    global $dbConn;
    $rs = mysqli_query($dbConn, $sql);
    $row = mysqli_fetch_assoc($rs);

    return $row;
}

function DB__getRows($sql) : array {

    global $dbConn;
    $rs = mysqli_query($dbConn, $sql);

    $array = [];
    while (true) {
        $row = mysqli_fetch_assoc($rs);

        if ($row == null) {
            break;
        }

        $array[] = $row;

    } 
    
    return $array;
}

function DB__secSql() {
    return new DB__SeqSql();
}

function DB__getRows2(DB__SeqSql $sql) {
    global $dbConn;

    $stmt = $dbConn->prepare($sql->getTemplate());

    
    $stmt->bind_param($sql->getForBindParam1stArg(), ...$sql->getParams());
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->fetch_assoc();
}


function DB__insert($sql) : int {
    global $dbConn;

    mysqli_query($dbConn, $sql);

    return mysqli_insert_id($dbConn);
}

function DB__update($sql) {
    global $dbConn;

    mysqli_query($dbConn, $sql);

}

function DB__delete($sql) {
    global $dbConn;

    mysqli_query($dbConn, $sql);
}

function getIntValueOr($value, $defaultValue) {
    if (isset($value)) {
        return intval($value);
    }

    return $defaultValue;
}

function getStringValueOr($value, $defaultValue) {
    if (isset($value)) {
        return strval($value);
    }

    return $defaultValue;
}

// js관련 함수

function jsAlert($msg) {
    echo "<script>";
    echo "alert('{$msg}');";
    echo "</script>";
}

function jsLocationReplaceExit($url, $msg = null) {
    if ($msg != null) {
        jsAlert($msg);
    }
    echo "<script>";
    echo "location.replace('{$url}');";
    echo "</script>";
}

function jsHistoryBack($msg = null) {
    if ($msg != null) {
        jsAlert($msg);
    }
    echo "<script>";
    echo "history.back();";
    echo "</script>";
}

