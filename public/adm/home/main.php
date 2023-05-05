<?php
// ADMIN PAGE PLACE
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/adm.php';

$pageTitle = 'Main Page';

// ADMIN PAGE TOP
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/adm/head.php';
?>

<div class="con">
    <a href="/adm/member/doLogout.php">Logout</a>
</div>

<?php
// ADMIN PAGE BOTTOM
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/adm/foot.php';
?>
