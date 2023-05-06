<?php
// ADMIN PAGE PLACE
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/adm.php';

// $id = ArticleService::makeBoard($_REQUEST);
// jsAlert("Make New No. {$id} Board.");

ArticleService::makeBoard($_REQUEST);

jsAlert("Make New Board ({$_REQUEST['boardName']})");
jsLocationReplace("/adm/board/list.php");
 