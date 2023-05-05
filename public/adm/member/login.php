<?php
$config = [];
$config['needToLogin'] = false;

// ADMIN PAGE PLACE
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/adm.php';

$pageTitle = 'Login Page';

// ADMIN PAGE TOP
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/adm/head.php';
?>

<form class="con table-box form1" action="doLogin.php" method="POST">
    <table>
        <colgroup>
            <col width="300">
        </colgroup>
        <tbody>
            <tr>
                <th>Login ID</th>
                <td>
                    <div class="form-control">
                        <input name="loginId" type="text" maxlength="20" placeholder="Enter Login ID" required autofocus>
                    </div>
                </td>
            </tr>
            <tr> 
                <th>Login PASSWORD</th>
                <td>
                    <div class="form-control">
                        <input name="loginPW" type="password" maxlength="20" placeholder="Enter Login PASSWORD" required>
                    </div>
                </td>
            </tr>
            <tr>
                <th>Login</th>
                <td>
                    <div class="form-control">
                        <button type="submit" class="btn btn-primary">Login</button>
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
