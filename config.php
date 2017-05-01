<?php

    defined('PROM') or exit('<h1>Access denied!</h1> ');

    // CONST
    define('CONTROLLER', 'core/controller');
    define('MODEL', 'core/model');
    define('VIEW', 'template/default');
    define('SITE_URL', '/');

    // Количество выводимых товаров на странице
    define('QUANTITY', 5);

    // Количество ссылок в пагинации
    define('QUANTITY_LINKS', 3);

    // Путь к папке с изображениями
    define('UPLOAD_DIR', 'images/');

    // Подклюячение к БД
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD', '');
    define('DB_NAME', 'promenergo');

    // Дополнительные настройки [пути к js-скриптам, к стилям]
    $conf = [
        'styles' => [
          'css/style.css'
        ],
        'scripts' => [
            'js/func.js',
            'js/jquery.cookie.js',
            'js/jquery-1.7.2.min.js',
            'js/jquery-ui-1.8.20.custom.min.js',
            'js/js.js',
            'js/prelod.js',
            'js/script.js'
        ],
        'styles_admin' => [
            'css/style.css'
        ],
        'scripts_admin' => [
            'js/func.js',
            'js/jquery.cookie.js',
            'js/jquery-1.7.2.min.js',
            'js/jquery-ui-1.8.20.custom.min.js',
            'js/js.js',
            'js/prelod.js',
            'js/script.js'
        ]
    ];
