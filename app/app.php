<?php

class App {
    public static function isLogined(): bool {
        if(isset($_SESSION['loginedMemberId'])) {
            return true;
        }
        return false;
    }
}

Class MemberService {
    public static function getMemberByLoginId(String $loginId): array {
        return MemberDAO::getMemberByLoginId($loginId);
    }
}

Class MemberDAO {
    public static function getMemberByLoginId(String $loginId): array {
        $sql = "SELECT * FROM MEMBER WHERE loginId = '{$loginId}'";
        return DB__getDBRows($sql);
    }
}