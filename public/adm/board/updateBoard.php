<?php

// ADMIN PAGE PLACE
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/adm.php';

$pageTitle = 'Update Board Page';

// ADMIN PAGE TOP
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/adm/head.php';

$board = ArticleService::getBoardById($_REQUEST['id']);

?>

<form class="con table-box form1" action="doUpdate.php" method="POST">
    <input type="hidden" name = "id" value="<?=$board['id']?>">
    <table>
        <colgroup>
            <col width="300">
        </colgroup>
        <tbody>
            <tr>
                <th>Name</th>
                <td>
                    <div class="form-control">
                        <input name="boardName" value="<?=$board['name']?>" type="text" maxlength="20" placeholder="Enter Board Name" required autofocus>
                    </div>
                </td>
            </tr>
            <tr> 
                <th>Code</th>
                <td>
                    <div class="form-control">
                        <select class="option" name="boardCode">
                            <?php switch($board['code']) {
                                case "notice": ?>
                                    <option value="notice" selected>Notice</option>
                                    <option value="announce">Announce</option>
                                    <option value="news">News</option>
                            <?php break;
                                case "announce": ?>
                                    <option value="notice">Notice</option>
                                    <option value="announce" selected>Announce</option>
                                    <option value="news">News</option>
                            <?php break; 
                                case "news": ?>
                                    <option value="notice">Notice</option>
                                    <option value="announce">Announce</option>
                                    <option value="news" selected>News</option>
                            <?php break;
                                } ?>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <th>Write</th>
                <td>
                    <div class="form-control">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</form>

<?php
// ADMIN PAGE BOTTOM
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/adm/foot.php';
?>
