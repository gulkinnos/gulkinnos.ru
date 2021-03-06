<?php

/**
 * Description of App
 *
 * @author Home
 */
class App {

    public static $config = array();
    public $db = null;
    protected static $_instance = null;

    function __construct() {
        
    }
    /**
     * 
     * @return \App
     */
    public static function getInstance() {
        if (self::$_instance === null) {
            self::$_instance = new self;
            self::$config = self::getConfig();
            include_once './App/Classes/Visitors.php';
            header('Content-Type: text/html; charset=utf-8');
        }
        return self::$_instance;
    }

    public static function getConfig() {
        if (empty(self::$config)) {
            include $_SERVER['DOCUMENT_ROOT'] . '/App/Classes/config.php';
            self::$config = $config;
        }
        return self::$config;
    }

    /** Подключается к базе данных.
     * Принимает массив с конфигом в качестве параметров.
     * Возвращает link на подклюение к базе данных.
     * @todo Заменить на нормальный метод, добавить проверок, что подключения ещё нет, что нет ошибок, что пришёл нормальный конфиг.
     * 
     * @param array $configArray -конфиг целиком.
     * @return \mysqli
     */
    public function getDB() {
        if (is_null($this->db)) {
            $dbLink = new mysqli(self::$config['db']['host'], self::$config['db']['user'], self::$config['db']['password'], self::$config['db']['database']);
            $setSQL = 'SET NAMES utf8 COLLATE utf8_general_ci';
            $dbLink->query($setSQL);
            $this->db = $dbLink;
        }
        return $this->db;
    }

}
