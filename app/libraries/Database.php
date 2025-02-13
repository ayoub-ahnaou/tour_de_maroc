<?php



class Database {
    private PDO $connection;
    private static $instance;

    private function __construct() {
        try {
            $this->connection = new PDO("pgsql:host=". HOST_NAME .";dbname=". DATABASE_NAME, USER_NAME, PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            echo "Connection established with succes";
        } catch (Exception $e) {
            throw new Exception("Connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if(!isset(self::$instance)) self::$instance = new self();
        return self::$instance;
    }
    public function getConnection() {
        return $this->connection;
    }
}