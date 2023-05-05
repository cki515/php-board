<?php
$config = [];
$config['needToLogin'] = false;


// ADMIN PAGE PLACE
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/adm.php';

$member = MemberService::getMemberByLoginId($_REQUEST['loginId']);

if(empty($member)) {
    jsAlert("The ID does not exist.");
    jsHistoryBack();
} else if ($member['loginPW'] != $_REQUEST['loginPW']) {
    jsAlert("Invalid password.");
    jsHistoryBack();
} else {
    $_SESSION['loginedMemberId'] = $member['id'];
    $_SESSION['loginedMember'] = $member;
    
    jsAlert("Welcome! {$member['name']}");
    jsLocationReplace("/adm/home/main.php");
}
