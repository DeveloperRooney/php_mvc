<?php

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