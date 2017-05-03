<?php
// Доступ к файловой структуре в через браузер
define('PROM', true);

// Отправка заголовков
header('Content-Type:text/html;charset=utf-8');

// Старт сессии
session_start();

// Подключаем конфигирационный файл
require_once 'config.php';

// добавление в PATH путей поключаемых файлов
set_include_path(get_include_path() . PATH_SEPARATOR .
                                      CONTROLLER . PATH_SEPARATOR .
                                      MODEL . PATH_SEPARATOR .
                                      LIB . PATH_SEPARATOR);
// Автозагрузка классов
spl_autoload_register(function ($class) {
    if (!include_once ($class . '.php')) {
        try {
            throw new ContrException('Неправильный файл для поключения!');
        } catch (ContrException $e) {
            echo $e->getMessage();
        }
    }
});

$obj = Route_Controller::get_instance();
$obj->route();

echo '<h1>Index</h1>';