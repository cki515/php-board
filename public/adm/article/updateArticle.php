<?php

// ADMIN PAGE PLACE
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/adm.php';

$pageTitle = 'Update Article Page';
$boards = ArticleService::getForPrintBoards();
$article = ArticleService::getArticleById($_REQUEST['id']);
$displayStatusNames = ArticleService::getDisplayStatusNames();

// ADMIN PAGE TOP
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/adm/head.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/toastUiEditor.php';
?>

<script>
var ArticleUpdateForm__submitDone = false;
    function ArticleUpdateForm__submit(form) {
        if(ArticleUpdateForm__submitDone) {
            alert('Being processed...');
            return;
        }

        form.title.value = form.title.value.trim();
        if(form.title.value.length == 0) {
            alert('Please Enter Title.');
            form.title.focus();
            return ;
        }

        var editor = $(form).find('.toast-editor').data('data-toast-editor');
        content = editor.getMarkdown().trim();

        if(content == '') {
            alert('Please Enter Content.');
            editor.focus();
            return ;
        }
        form.content.value = content;

        form.submit();
        ArticleUpdateForm__submitDone = true;
    }
</script>
<form class="con table-box form1" action="doUpdate.php" method="POST" onsubmit="ArticleUpdateForm__submit(this); return false;">
    <input type="hidden" name="id" value="<?=$article['id']?>">
    <input type="hidden" name="content">
    <table>
        <colgroup>
            <col width="300">
        </colgroup>
        <tbody>
        <tr>
            <th>DisplayStatus</th>
            <td>
                <div class="form-control">
                    <select name="displayStatus">
                        <?php foreach($displayStatusNames as $displayStatus => $displayStatusName) { ?>
                        <?php $selected = $article['displayStatus'] == $displayStatus ? 'selected' : ''; ?>
                            <option <?=$selected?> value="<?=$displayStatus?>"><?=$displayStatusName?></option>
                        <?php } ?>
                    </select>
                </div>
            </td>
        </tr>
        <tr>
            <th>Board</th>
            <td>
                <div class="form-control">
                    <select name="boardId">
                        <?php foreach($boards as $board) { ?>
                        <?php $selected = $article['boardId'] == $board['id'] ? 'selected' : ''; ?>
                            <option <?=$selected?> value="<?=$board['id']?>"><?=$board['code']?></option>
                        <?php } ?>
                    </select>
                </div>
            </td>
        </tr>
        <tr>
            <th>Title</th>
            <td>
                <div class="form-control">
                    <input type="text" name="title" placeholder="Title" value="<?=$article['title']?>">
                </div>
            </td>
            </tr>
            <tr>
               <th>Content</th>
                <td>
                    <div class="form-control">
                        <script type="text/x-template"><?=$article['content']?></script>
                        <div class="toast-editor"></div>
                    </div>
                </td>
            </tr>
            <tr>
                <th>Update</th>
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
