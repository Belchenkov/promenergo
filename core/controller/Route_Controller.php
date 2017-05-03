<?php


class Route_Controller extends Base_Controller
{
    // Хранение объекта класса [Singleton]
    static $_instance;

    static function get_instance()
    {
        if (self::$_instance instanceof self) {
            return self::$_instance;
        }
        return self::$_instance = new self;
    }

    private function __construct()
    {
        $req_uri = $_SERVER['REQUEST_URI'];
        $path = substr($_SERVER['PHP_SELF'], 0, strpos($_SERVER['PHP_SELF'], 'index.php'));

        if ($path === SITE_URL) {
            $this->request_url = substr($req_uri, strlen(SITE_URL));


            $url = explode('/', rtrim($this->request_url, '/'));

            if (!empty($url[0])) {
                $this->controller = ucfirst($url[0] . '_Controller');
            } else {
                $this->controller = 'Index_Controller';
            }

            $count_in_url = count($url);

            if (!empty($url[1])) {
                $key = [];
                $value = [];
                for ($i = 1; $i < $count_in_url; $i++) {
                    if ($i % 2 != 0) {
                        $key[] = $url[$i];
                    } else {
                        $value[] = $url[$i];
                    }
                }
            }

            if (!$this->params = array_combine($key, $value)) {
                throw new ContrException('Неправильный адрес.');
            }

        } else {
            try {
                throw new Exception('<p style="color:red">Неправильный адрес сайта.</p>');
            } catch (Exception $e) {
                echo $e->getMessage();
                exit();
            }
        }

    }
}