<?php
// ADMIN PAGE PLACE
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/adm.php';

$article = ArticleService::getArticleById($_REQUEST['id']);

ArticleService::DeleteArticle($_REQUEST['id']);

jsAlert("Delete No. {$_REQUEST['id']} Board.");
jsLocationReplace("/adm/article/list.php");
