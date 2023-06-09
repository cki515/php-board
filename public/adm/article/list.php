<?php
// ADMIN PAGE PLACE
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/adm.php';

$pageTitle = 'Article List';

// ADMIN PAGE TOP
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/adm/head.php';

$_REQUEST['displayStatus'] = '__ALL__';
$listData = ArticleService::getForPrintListData($_REQUEST);
$articles = $listData['articles'];
$totalPage = $listData['totalPage'];
$boards = ArticleService::getForPrintBoards();
?>

<div class="con table-box">
    <table>
        <colgroup>
            <col width="30">
            <col width="180">
            <col width="100">
            <col width="50">
            <col>
            <col width="180">
        </colgroup>
        <thead>
            <th>NUM</th> 
            <th>Date</th>
            <th>Article</th>
            <th>DisplayStatus</th>
            <th>title</th>
            <th>Manage</th>
        </thead>
        <tbody>
            <?php foreach($articles as $article) { ?>
            <tr>
                <td><?=$article['id']?></td>
                <td><?=$article['regDate']?></td>
                <td><?=$article['boardName']?></td>
                <td><?=ArticleService::getDisplayStatusName($article['displayStatus'])?></td>
                <td class="detailColor"><a href="/adm/article/detail.php?id=<?=$article['id']?>"><?=$article['title']?></a></td>
                <td>
                    <a href="/adm/article/updateArticle.php?id=<?=$article['id']?>" class="div btn btn-primary">Update</a>
                    <a onClick="if(confirm('Delete it?') == false) return false;" href="/adm/article/doDelete.php?id=<?=$article['id']?>" class="div btn btn-delete">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<form class="con table-box form1 margin-top-30">
    <table>
        <colgroup>
            <col width="150">
        </colgroup>
        <tbody>
            <tr>
               <th>Board</th>
                <td>
                    <div class="form-control">
                        <select name="boardId" onchange="this.form.submit();">
                            <option value="">ALL</option>
                            <?php foreach($boards as $board) { ?>
                            <?php $selected = $_REQUEST['boardId'] == $board['id'] ? 'selected' : '' ?>
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
                        <input type="text" name="title" placeholder="Title" value="<?=getArrValue($_REQUEST, 'title', '')?>">
                    </div>
                </td>
            </tr>
            <tr>
               <th>Content</th>
                <td>
                    <div class="form-control">
                        <input type="text" name="content" placeholder="Content" value="<?=getArrValue($_REQUEST, 'content', '')?>">
                    </div>
                </td>
            </tr>
            <tr>
               <th>Search</th>
                <td>
                    <button type="submit" class="btn btn-info">Search</button>
                </td>
            </tr>
            
        </tbody>
    </table>
</div>

<div class="con table-box text-align-c margin-top-30">
    <?php for ($i =1; $i <= $totalPage; $i++) { ?>
    <a href="<?=getNewUrl($_SERVER['REQUEST_URI'], 'page', $i)?>" class="btn listBtn"><?=$i?></a>
    <?php } ?>
</div>
<div class="con margin-top-30">
    <a href="/adm/article/makeArticle.php" class="btn btn-info">Write Article</a>
</div>

<?php
// ADMIN PAGE BOTTOM
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/adm/foot.php';
?>
