<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= $headMetaDescription ?>">
    <title><?= $headTitle ?></title>
    <link rel="shortcut icon" href="/favicon.ico"/>
    <link href="/resources/css/bootstrap.min.css" rel="stylesheet">
    <link href="/resources/css/custom.css" rel="stylesheet">
    <script src="/resources/js/jquery-3.1.1.min.js"></script>
    <script src="/resources/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="top-menu-block row">
        <nav class="navbar navbar-default">
            <div class="container-fluid"> 
                <div class="navbar-header">
                    <ul class="nav navbar-nav">
                        <?php
                        if (isset($config['mainMenu']) && is_array($config['mainMenu'])) {
                            foreach ($config['mainMenu'] as $itemName => $itemURL) {
                                ?>
                                <li <?php
                                if (($appRoute . '/') == $itemURL || ($appRoute) == $itemURL) {
                                    echo 'class="active"';
                                }
                                ?>
                                    >
                                    <a href="/<?= $itemURL ?>"><?= $itemName ?></a></li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="row">
        Это общая страница проекта. Тут будет меню, хедер, футер, форма авторизации и прочая лабуда<br>
        <a href="/">На главную</a>
        <a href="/aboutProject/">О проекте</a>
    </div>

</body>
