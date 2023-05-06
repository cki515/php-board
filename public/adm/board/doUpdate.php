<?php
// ADMIN PAGE PLACE
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/adm.php';

ArticleService::updateBoard($_REQUEST);

jsAlert("Complete Update");
jsLocationReplace("/adm/board/list.php");
 