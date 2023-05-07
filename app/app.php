<?php

class App {
    public static function isLogined(): bool {
        if(isset($_SESSION['loginedMemberId'])) {
            return true;
        }
        return false;
    }
}

require_once "ArticleService.php";
require_once "ArticleDAO.php";
require_once "MemberService.php";
require_once "MemberDAO.php";