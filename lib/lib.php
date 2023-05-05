<?php

function jsAlert(String $msg) {
    echo "<script> alert('{$msg}'); </script>";
}

function jsLocationReplace(String $url) {
    echo "<script> location.replace('{$url}'); </script>";
    exit;
}

function jsHistoryBack() {
    echo "<script> history.back(); </script>";
}

function DB_excute($sql) {
    global $config;
    return mysqli_query($config['dbConn'], $sql);
}

function DB__getDBRows($sql) {
    $rs = DB_excute($sql);

    $rows = [];

    while($row = mysqli_fetch_assoc($rs)) {
        $rows = $row;
    }
    return $rows;
}

function DB__getDBRow($sql) {
    $rows = DB__getDBRow($sql);

    if(isset($rows[0])) {
        return $rows[0];
    }
    return [];
}

function filterSqlInjection(&$args) {
    global $config;
    foreach($args as $key => $val) {
        $args[$key] = mysqli_real_escape_string($config['dbConn'], $val);
    }
}
