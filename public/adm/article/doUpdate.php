<?php
// ADMIN PAGE PLACE
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/adm.php';

ArticleService::updateArticle($_REQUEST);

jsAlert("Complete Update");
jsLocationReplace("/adm/article/list.php");
 