<?php

class App {
    public static function isLogined(): bool {
        if(isset($_SESSION['loginedMemberId'])) {
            return true;
        }
        return false;
    }
}

Class MemberService {
    public static function getMemberByLoginId(String $loginId): array {
        return MemberDAO::getMemberByLoginId($loginId);
    }
}

Class MemberDAO {
    public static function getMemberByLoginId(String $loginId): array {
        $sql = "SELECT * FROM MEMBER WHERE loginId = '{$loginId}'";
        return DB__getDBRow($sql);
    }
}

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

}

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
    
}