<?php

// ADMIN PAGE PLACE
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/adm.php';

$pageTitle = 'Detail Article Page';
$boards = ArticleService::getForPrintBoards();
$article = ArticleService::getArticleById($_REQUEST['id']);

require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/adm/head.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/toastUiEditor.php';
?>

<div class="con table-box">
    <table>
        <colgroup>
            <col width="300">
        </colgroup>
        <tbody>
        <tr>
            <th>DisplayStatus</th>
            <td>
                <?=ArticleService::getDisplayStatusName($article['displayStatus'])?>
            </td>
        </tr>
        <tr>
            <th>Board</th>
            <td>
                <?=ArticleService::getBoardName($article['boardId'], $boards)?>
            </td>
        </tr>
        <tr>
            <th>Title</th>
            <td>
                <?=$article['title']?>
            </td>
            </tr>
            <tr>
               <th>Content</th>
                <td>
                    <script type="text/x-template"><?=$article['content']?></script>
                    <div class="toast-editor toast-editor-viewer"></div>
                </td>
            </tr>
            <tr>
                <th>Manage</th>
                <td>
                    <div class="form-control">
                        <a href="/adm/article/updateArticle.php?id=<?=$article['id']?>" class="btn btn-primary">Update</a>
                        <a onClick="if(confirm('Delete it?') == false) return false;" href="/adm/article/doDelete.php?id=<?=$article['id']?>" class="btn btn-delete">Delete</a>
                        <a href="#" onclick="history.back(); return false;" class="btn btn-info">Back to</a>
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
