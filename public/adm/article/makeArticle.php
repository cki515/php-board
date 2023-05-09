<?php

// ADMIN PAGE PLACE
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/adm.php';

$pageTitle = 'Write Article Page';
$boards = ArticleService::getForPrintBoards();

// ADMIN PAGE TOP
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/adm/head.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/toastUiEditor.php';
?>

<script>
var ArticleWriteForm__submitDone = false;
    function ArticleWriteForm__submit(form) {
        if(ArticleWriteForm__submitDone) {
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
        ArticleWriteForm__submitDone = true;
    }
</script>
<form class="con table-box form1" action="doWrite.php" method="POST" onsubmit="ArticleWriteForm__submit(this); return false;">
    <input type="hidden" name="content">
    <table>
        <colgroup>
            <col width="300">
        </colgroup>
        <tbody>
        <tr>
            <th>Board</th>
                <td>
                    <div class="form-control">
                        <select name="boardId">
                            <?php foreach($boards as $board) { ?>
                                <option value="<?=$board['id']?>"><?=$board['code']?></option>
                            <?php } ?>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
               <th>Title</th>
                <td>
                    <div class="form-control">
                        <input type="text" name="title" placeholder="Title" value="">
                    </div>
                </td>
            </tr>
            <tr>
               <th>Content</th>
                <td>
                    <div class="form-control">
                        <script type="text/x-template"></script>
                        <div class="toast-editor"></div>
                    </div>
                </td>
            </tr>
            <tr>
                <th>Write</th>
                <td>
                    <div class="form-control">
                        <button type="submit" class="btn btn-info">Write</button>
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
