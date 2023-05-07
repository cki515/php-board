<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once __DIR__ . "/../common.php"; ?>
    <link rel="stylesheet" href="/resource/common.css">
    <link rel="stylesheet" href="/resource/app.css">
    <link rel="stylesheet" href="/resource/adm/app.css">
    
    <title><?=$config['siteName']?> ADMIN PAGE</title>
</head>
<body>
    <div class="top-bar">
        <div class="con height-100p flex flex-jc-sb">
            <a href="/" class="logo flex flex-ai-c">
                <span><i class="fa-solid fa-house-chimney-medical"></i></span>
                <span>ABC Clinic</span>
            </a>
            <nav class="menu-box-1">
                <ul class="flex height-100p">
                    <li><a href="" class="flex flex-jc-c flex-ai-c height-100p">HOME</a></li>
                    <li><a href="/adm/board/list.php" class="flex flex-jc-c flex-ai-c height-100p">BOARD MANAGE</a></li>
                    <li><a href="/adm/article/list.php" class="flex flex-jc-c flex-ai-c height-100p">POST MANAGE</a></li>
                    <li><a href="" class="flex flex-jc-c flex-ai-c height-100p">POPUP MANAGE</a></li>
                    <?php if(App::isLogined() ) { ?>
                        <li>
                        <a href="/adm/member/doLogout.php" class="flex flex-jc-c flex-ai-c height-100p">LOGOUT</a>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </div>
    
    <h1 class="title-box con">
        <?=$pageTitle?>
    </h1>