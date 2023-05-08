<?php

Class ArticleService {
    public static function getForPrintBoards(): array {
        return ArticleDAO::getForPrintBoards();
    }

    public static function getBoardById(int $id) {
        return ArticleDAO::getBoardById($id);
    }

    public static function DeleteBoard(int $id) {
        ArticleDAO::DeleteBoard($id);
    }

    public static function makeBoard($args): int {
        return ArticleDAO::makeBoard($args);
    }

    public static function updateBoard($args) {
        ArticleDAO::updateBoard($args);
    }

    public static function writeArticle($args): int {
        return ArticleDAO::writeArticle($args);
    }


    public static function getForPrintListData($args) {
        if(isE($args, 'displayStatus') == false) {
            $args['displayStatus'] = 1;
        }
        
        $totalCount = ArticleDAO::getForPrintListArticlesCount($args);
        $itemsInPage = 5;
        $page = getArrValue($args, 'page', 1);

        $limitFrom = $itemsInPage * ($page - 1);
        $limitTake = $itemsInPage;

        $args['limitFrom'] = $limitFrom;
        $args['limitTake'] = $limitTake;

        $articles = ArticleDAO::getForPrintListArticles($args);

        $rsData = [];
        $rsData['articles'] = $articles;
        $rsData['page'] = $page;
        $rsData['totalCount'] = $totalCount;
        $rsData['totalPage'] = ceil($rsData['totalCount'] / $itemsInPage);
        return $rsData;
    }

    public static function getDisplayStatusName(int $displayStatus): string {
        if($displayStatus == 1) {
            return 'Display';
        }
        return 'Non Display';
    }
}