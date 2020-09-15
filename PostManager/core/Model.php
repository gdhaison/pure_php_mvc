<?php
class Model {
    static $cnx =array(); //
    public $db = 'testdb'; // name database
    public function __construct()
    {
        $config = Config::$database[$this->db];

        if (isset(Model::$cnx[$this->db]))
        { return true;}
        $db = $conn = new mysqli($servername, $username, $password, $db);
        Model::$cnx[$this->db] = $db;
    }
}
