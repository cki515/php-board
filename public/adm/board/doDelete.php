<?php
// ADMIN PAGE PLACE
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/adm.php';

$board = ArticleService::getBoardById($_REQUEST['id']);

if(empty($board)) {
    jsAlert("The Board does not exist.");
    jsHistoryBack();
}

ArticleService::DeleteBoard($_REQUEST['id']);

jsAlert("Delete No. {$_REQUEST['id']} Board.");
jsLocationReplace("/adm/board/list.php");
