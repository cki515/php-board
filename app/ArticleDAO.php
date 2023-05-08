<?php
require_once "ArticleService.php";

Class ArticleDAO {
    public static function getForPrintBoards(): array {
        $sql = "SELECT * FROM BOARD ORDER BY id DESC";
        return DB__getDBRows($sql);
    }

    public static function getBoardById(int $id) {
        $sql = "SELECT * FROM BOARD WHERE id= '{$id}'";
        return DB__getDBRow($sql);
    }

    public static function DeleteBoard(int $id) {
        $sql = "DELETE FROM BOARD WHERE id = '{$id}'";
        return DB__delete($sql); 
    }

    public static function makeBoard($args): int {
        $sql = "INSERT INTO BOARD SET regDate = NOW(), updateDate = NOW(), name = '{$args['boardName']}', code = '{$args['boardCode']}'";
        return DB__insert($sql);
    }

    public static function updateBoard($args) {
        $sql = "UPDATE BOARD SET updateDate = NOW(), name = '{$args['boardName']}', code = '{$args['boardCode']}' WHERE id = '{$args['id']}'";
        return DB__update($sql); 
    }
    
    public static function writeArticle($args): int {
        $sql = "INSERT INTO ARTICLE SET regDate = NOW(), updateDate = NOW(), memberId = '{$args['memberId']}', boardId = '{$args['boardId']}', title = '{$args['title']}', content = '{$args['content']}', displayStatus = 1";
        return DB__insert($sql);
    }

    


    public static function getForPrintListArticlesCount($args): int {
        $sql = "SELECT COUNT(*) AS cnt FROM ARTICLE WHERE 1";
        
        // displayStatus
        if(isE($args, 'displayStatus') and $args['displayStatus'] !== '__ALL__') {
            $sql .= " AND displayStatus = '{$args['displayStatus']}'";
        }

        // boardID search
        if(isE($args, 'boardId')) {
            $sql .= " AND boardId = '{$args['boardId']}'";
        }

        // title search
        if(isE($args, 'title')) {
            $sql .= " AND title LIKE CONCAT('%', '{$args['title']}', '%')";
        }

        // content search
        if(isE($args, 'content')) {
            $sql .= " AND content LIKE CONCAT('%', '{$args['content']}', '%')";
        }

        return DB__getDBRowIntValue($sql, 0);
    }

    public static function getForPrintListArticles($args) {
        $sql = "
        SELECT A.*, B.name AS boardName
        FROM ARTICLE AS A
        INNER JOIN BOARD AS B
        ON A.boardId = B.id
        WHERE 1";

        // displayStatus
        if(isE($args, 'displayStatus') and $args['displayStatus'] !== '__ALL__') {
            $sql .= " AND A.displayStatus = '{$args['displayStatus']}'";
        }

        // boardID search
        if(isE($args, 'boardId')) {
            $sql .= " AND boardId = '{$args['boardId']}'";
        }

        // title search
        if(isE($args, 'title')) {
            $sql .= " AND title LIKE CONCAT('%', '{$args['title']}', '%')";
        }

        // content search
        if(isE($args, 'content')) {
            $sql .= " AND content LIKE CONCAT('%', '{$args['content']}', '%')";
        }
        $sql .= " 
        ORDER BY A.id DESC
        LIMIT {$args['limitFrom']}, {$args['limitTake']}";
        return DB__getDBRows($sql); 
    }
}


