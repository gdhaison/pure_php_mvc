<?php
namespace Model;

use PDO;
use PDOException;
$conf = require_once 'config/application.config.php';
class Provider
{
    private static $instance;

    public static function getInstance()
    {
        if(is_null(Provider::$instance)){
            Provider::$instance = new Provider();
        }
        return Provider::$instance;
    }

    public function excuteQuery(string $query,array $parameters = [])
    {
        try {
            $db_cfg = require_once 'config/application.config.php';
            $connectString = 'mysql:host='. DB_HOST .';dbname='. DB_DATABASE .';charset=utf8';

            $connect = new PDO($connectString, DB_USER, DB_PASS);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $statement = $connect->prepare($query);
            $statement->setFetchMode(PDO::FETCH_ASSOC);

            if ($parameters != null) {
                for ($i = 0; $i < count($parameters); $i++) {
                    $statement->bindParam($i + 1, $parameters[$i]);
                }
            }

            $statement->execute();
            $result = [];

            while ($item = $statement->fetch()) {
                array_push($result, $item);
            }

            return $result;
        } catch (PDOException $e) {
            echo $query . PHP_EOL . $e->getMessage();
        }
    }

    public function excuteNonQuery(string  $query,array $parameters = [])
    {
        try {
            $db_cfg = require_once 'config/application.config.php';
            $connectString = 'mysql:host='. DB_HOST .';dbname='. DB_DATABASE .';charset=utf8';

            $connect = new PDO($connectString, DB_USER, DB_PASS);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $statement = $connect->prepare($query);

            if ($parameters != null) {
                for ($i = 0; $i < count($parameters); $i++) {
                    $statement->bindParam($i + 1, $parameters[$i]);
                }
            }

            $result = $statement->execute();

            return $result;
        } catch (PDOException $e) {
            echo $query . PHP_EOL . $e->getMessage();
        }
    }

    public function excuteScalarQuery(string $query,array $parameters = [])
    {
        try {
            $db_cfg = require_once 'config/application.config.php';
            $connectString = 'mysql:host='. DB_HOST .';dbname='. DB_DATABASE .';charset=utf8';

            $connect = new PDO($connectString, DB_USER, DB_PASS);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $statement = $connect->prepare($query);
            $statement->setFetchMode(PDO::FETCH_OBJ);

            if ($parameters != null) {
                for ($i = 0; $i < count($parameters); $i++) {
                    $statement->bindParam($i + 1, $parameters[$i]);
                }
            }

            $statement->execute();
            $result = $statement->fetch();

            return $result;
        } catch (PDOException $e) {
            echo $query . PHP_EOL . $e->getMessage();
        }
    }
}
