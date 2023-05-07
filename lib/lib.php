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

function DB__excute($sql) {
    global $config;
    return mysqli_query($config['dbConn'], $sql);
}

function DB__getDBRows($sql) {
    $rs = DB__excute($sql);

    $rows = [];

    while($row = mysqli_fetch_assoc($rs)) {
        $rows[] = $row;
    }
    return $rows;
}

function DB__getDBRow($sql) {
    $rows = DB__getDBRows($sql);

    if(isset($rows[0])) {
        return $rows[0];
    }
    return [];
}

function DB__getDBRowIntValue($sql, $default): int {
    $row = DB__getDBRow($sql);

    if(empty($row)) {
        return $default;
    }

    foreach($row as $val) {
        return $val;
    }
}

function DB__getDBRowStringValue($sql, $default): string {
    $row = DB__getDBRow($sql);

    if(empty($row)) {
        return $default; 
    }

    foreach($row as $val) {
        return $val;
    }
}

function DB__insert($sql) {
    global $config;
    DB__excute($sql);
    return mysqli_insert_id($config['dbConn']);
}

function DB__update($sql) {
    DB__excute($sql);
}

function DB__delete($sql) {
    DB__excute($sql);
}

function filterSqlInjection(&$args) {
    global $config;
    foreach($args as $key => $val) {
        $args[$key] = mysqli_real_escape_string($config['dbConn'], $val);
    }
}

function getArrValue(&$arr, $key, $default) {
    if(isset($arr[$key])) {
        return $arr[$key];
    }
    return $default;
}

function getNewUrl(String $url, String $paramKey, String $paramValue) {
    
    $urlInfo = getUrlInfo($url);

    $urlInfo['queryParams'][$paramKey] = $paramValue;
    
    return $urlInfo['url'] . '?' . getQueryStringFromParam($urlInfo['queryParams']); 
}

function getUrlInfo(String $url) {
    if(strpos($url, '?') === false) {
        $url .= "?";
    }

    list($url, $queryStr) = explode('?', $url);
    
    $queryStrBits = explode('&', $queryStr);
    $queryParams = [];

    foreach($queryStrBits as $paramStr) {
        $paramStrBits = explode('=', $paramStr);
        $key = $paramStrBits[0];
        if($key) {
            $value = '';
            if(isset($paramStrBits[1])) {
                $value = $paramStrBits[1];
            }
            $queryParams[$key] = $value;
        }
    }

    $info = [];
    $info['url'] = $url;
    $info['queryStr'] = $queryStr;
    $info['queryParams'] = $queryParams;

    return $info;
}

function getQueryStringFromParam($params): string {
    $queryStr = '';
    foreach($params as $key => $value) {
        if($queryStr) {
            $queryStr .= '&';
        }
        $queryStr .= $key . '=' . $value;
    }
    return $queryStr;
}

function isE(&$arr, $key) {
    return isset($arr[$key]) and !empty($arr[$key]);
}