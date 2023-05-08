<?php
// ADMIN PAGE PLACE
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/adm.php';

$_REQUEST['memberId'] = $_SESSION['loginedMemberId'];

$id = ArticleService::writeArticle($_REQUEST);

jsAlert("Write New No. {$id} Article.");
jsLocationReplace("/adm/article/list.php");
