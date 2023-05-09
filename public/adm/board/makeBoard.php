<?php

// ADMIN PAGE PLACE
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/adm.php';

$pageTitle = 'Write Board Page';

// ADMIN PAGE TOP
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/adm/head.php';
?>

<form class="con table-box form1" action="doMake.php" method="POST">
    <table>
        <colgroup>
            <col width="300">
        </colgroup>
        <tbody>
            <tr>
                <th>Name</th>
                <td>
                    <div class="form-control">
                        <input name="boardName" type="text" maxlength="20" placeholder="Enter Board Name" required autofocus>
                    </div>
                </td>
            </tr>
            <tr> 
                <th>Code</th>
                <td>
                    <div class="form-control">
                        <select class="option" name="boardCode">
                            <option value="notice">Notice</option>
                            <option value="announce">Announce</option>
                            <option value="news">News</option>
                        </select>
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
