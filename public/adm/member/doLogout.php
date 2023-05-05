<?php

// ADMIN PAGE PLACE
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/adm.php';

unset($_SESSION['loginedMemberId']);
unset($_SESSION['loginedMember']);
jsLocationReplace('/adm/member/login.php');
