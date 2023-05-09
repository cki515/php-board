<?php
// ADMIN PAGE PLACE
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/adm.php';

$pageTitle = 'Board List';

// ADMIN PAGE TOP
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/adm/head.php';

$boards = ArticleService::getForPrintBoards();

?>

<div class="con table-box">
    <table>
        <colgroup>
            <col width="30">
            <col width="200">
            <col width="100">
            <col>
            <col width="180">
        </colgroup>
        <thead>
            <th>NUM</th> 
            <th>Date</th>
            <th>Board Code</th>
            <th>Board Name</th>
            <th>Manage</th>
        </thead>
        <tbody>
            <?php foreach($boards as $board) { ?>
            <tr>
                <td><?=$board['id']?></td>
                <td><?=$board['regDate']?></td>
                <td><?=$board['code']?></td>
                <td class="detailColor"><a href="/adm/board/updateBoard.php?id=<?=$board['id']?>"><?=$board['name']?></a></td>
                <td>
                    <a href="/adm/board/updateBoard.php?id=<?=$board['id']?>" class="div btn btn-primary">Update</a>
                    <a onClick="if(confirm('Delete it?') == false) return false;" href="/adm/board/doDelete.php?id=<?=$board['id']?>" class="div btn btn-delete">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<div class="con margin-top-30">
    <a href="/adm/board/makeBoard.php" class="btn btn-primary">Write Board</a>
</div>


<?php
// ADMIN PAGE BOTTOM
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/adm/foot.php';
?>
