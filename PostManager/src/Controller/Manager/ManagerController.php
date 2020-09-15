<?php

use Model\Provider;

require_once(__DIR__ . '/../../Model/Provider.php');

class ManagerController
{
    private static $instance;

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new ManagerController();
        }

        return self::$instance;
    }

    public function index()
    {
        (is_null($_POST['per_page']) ? $per_page = 5 : $per_page = $_POST['per_page']);
        $query = 'SELECT * FROM posts LIMIT ' . $per_page;
        echo $per_page;
        $posts = Provider::getInstance()->excuteQuery($query);
        require_once(__DIR__ . '/../../View/Manager/index.php');
    }

    public function create()
    {
        require_once(__DIR__ . '/../../View/Manager/create.php');
    }

    public function store()
    {
        $target_dir = "/home/vuhaison/Desktop/PostManager/public/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

        $image = "";
        if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
            $image = $target_file;
        }

        $query = 'INSERT INTO posts(title, description, image, status) VALUES(?, ?, ?, ?)';
        $provider = Provider::getInstance()->excuteNonQuery($query, [
            $_POST['title'],
            $_POST['description'],
            $image,
            $_POST['status'],
        ]);
        if ($provider) {
            header('Location: ?controller=manager&action=index');
        } else {
            echo 'Stored incorret';
        }
    }

    function show()
    {
        echo 'show';
    }
    public function edit()
    {
        $id = $_GET['id'];
        $query = "Select * from posts where id = " . $id;
        $posts = Provider::getInstance()->excuteQuery($query);
        $post = $posts[0];
        require_once(__DIR__ . '/../../View/Manager/edit.php');
    }

    public function update($id)
    {

        $query = 'Update posts set title=?, description=?, image=?, status=? where id=?';

        $provider = Provider::getInstance()->excuteNonQuery($query, [
            $_POST['title'],
            $_POST['description'],
            $_POST['image'],
            $_POST['status'],
            $id,
        ]);
        if ($provider) {
            header('Location: ?controller=manager&action=index');
        } else {
            echo 'Stored incorret';
        }
    }

    public function destroy($id)
    {
        $query = 'Delete from posts where id = ?';

        $provider = Provider::getInstance()->excuteNonQuery($query, [
            $id
        ]);
        if ($provider) {
            header('Location: ?controller=manager&action=index');
        } else {
            echo 'Stored incorret';
        }
    }
}