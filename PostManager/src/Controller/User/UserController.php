<?php
use Model\Provider;

require_once(__DIR__ . '/../../Model/Provider.php');

class UserController {
    private static $instance;

    public static function getInstance()
    {
        if (is_null(self::$instance))
        {
            self::$instance = new ManagerController();
        }

        return self::$instance;
    }

    public function index()
    {
        $query = 'SELECT * FROM posts';
        $posts = Provider::getInstance()->excuteQuery($query);

        require_once(__DIR__ . '/../../View/User/index.php');
    }

    public function show($id)
    {
        $query = 'SELECT * FROM posts where id = ' . $id;
        $posts = Provider::getInstance()->excuteQuery($query);
        $post = $posts[0];

        require_once(__DIR__ . '/../../View/User/show.php');
    }
}