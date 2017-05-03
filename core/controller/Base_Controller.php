<?php

abstract class Base_Controller
{
    protected $request_url;
    protected $controller;
    protected $params;
    protected $page;
    protected $styles, $styles_admin;
    protected $scripts, $scripts_admin;
    protected $error;

    // Collect router
    public function route()
    {

    }

    //  Формирует массив стилей и скриптов
    public function init()
    {
        global $conf;

        // Собираем файлы стилей
        if (isset($conf['styles'])) {
            foreach ($conf['styles'] as $style_admin) {
                $this->styles_admin[] = trim($style_admin, '/');
            }
        }
        if (isset($conf['styles_admin'])) {
            foreach ($conf['styles_admin'] as $style) {
                $this->styles[] = trim($style, '/');
            }
        }

        // Собираем файлы скриптов
        if (isset($conf['scripts'])) {
            foreach ($conf['scripts'] as $scripts) {
                $this->scripts[] = trim($scripts, '/');
            }
        }
        if (isset($conf['scripts_admin'])) {
            foreach ($conf['scripts_admin'] as $scripts_admin) {
                $this->scripts_admin[] = trim($scripts_admin, '/');
            }
        }
    }

    protected function get_controller()
    {
        return $this->controller;
    }

    protected function get_params()
    {
        return $this->params;
    }

    // Получение входных данных
    protected function input()
    {

    }

    // Возвращает готовую страницу
    protected function output()
    {

    }

    public function request($param = [])
    {
        $this->init();
        $this->input($param);
        $this->output();

        if (!empty($this->error)) {
            $this->write_error($this->error);
        }

        $this->get_page();
    }

    // Вывод на экран готовой страницы
    public function get_page()
    {
        echo $this->page;
    }

    // шаблонизатор
    protected function render($path, $params = [])
    {
        extract($params);

        ob_start();
        if (!include_once($path . '.php')) {
            throw new ContrException('Данного шаблона не существует.');
        }
        return ob_get_clean();
    }

    // Очистка строковых данных
    public function clear_str($var)
    {
        if (is_array($var)) {
            $row = [];
            foreach ($var as $key => $item) {
                $row[$key] = trim(strip_tags($item));
            }
            return $row;
        }
        return trim(strip_tags($var));
    }

    // Очистка числовых данных
    public function clear_int($var)
    {
        return (int)$var;
    }

    // Определение метода поступления данных
    public function is_post()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            return true;
        }
        return false;
    }

    // Проверка авторизации пользователя
    public function check_auth()
    {

    }

    // Запись ошибок в log.txt
    public function write_error($err)
    {
        $time = date("d-m-Y G:i:s");
        $str = 'Fault: ' . $time . ' -- ' . $err . "\n\r";
        file_put_contents('log.txt', $str, FILE_APPEND);

    }

    // Уменьшение изображения в размере
    public function img_resize($dest)
    {

    }

}