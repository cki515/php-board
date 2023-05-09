<?php

Class ArticleService {
    public static function getForPrintBoards(): array {
        return ArticleDAO::getForPrintBoards();
    }

    public static function getBoardById(int $id) {
        return ArticleDAO::getBoardById($id);
    }

    public static function getArticleById(int $id) {
        return ArticleDAO::getArticleById($id);
    }

    public static function DeleteBoard(int $id) {
        ArticleDAO::DeleteBoard($id);
    }

    public static function DeleteArticle(int $id) {
        ArticleDAO::DeleteArticle($id);
    }
    
    public static function makeBoard($args): int {
        return ArticleDAO::makeBoard($args);
    }

    public static function updateBoard($args) {
        ArticleDAO::updateBoard($args);
    }

    public static function updateArticle($args) {
        ArticleDAO::updateArticle($args);
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

    public static function getDisplayStatusNames() {
        return [
            0 => 'Non Display',
            1 => 'Display',
        ];
    }

    public static function getDisplayStatusName(int $displayStatus): string {
        return static::getDisplayStatusNames()[$displayStatus];
    }

    public static function getBoardName($boardId, &$boards) {
        foreach($boards as $board) {
            if($board['id'] == $boardId) {
                return $board['code'];
            }
        }
        return ;
    }
}