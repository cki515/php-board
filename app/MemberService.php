<?php

require_once "MemberService.php";

Class MemberService {
    public static function getMemberByLoginId(String $loginId): array {
        return MemberDAO::getMemberByLoginId($loginId);
    }
}