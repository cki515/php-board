<?php

Class MemberDAO {
    public static function getMemberByLoginId(String $loginId): array {
        $sql = "SELECT * FROM MEMBER WHERE loginId = '{$loginId}'";
        return DB__getDBRow($sql);
    }
}