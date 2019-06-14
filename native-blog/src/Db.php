<?php

/**
 * Class Db singleton
 * @author hoangpt
 */
class Db
{
    private static $instance = NULL;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    /**
     * Singleton connection
     * @author hoangpt
     *
     * @return null|PDO
     */
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$instance = new PDO('mysql:host=localhost;dbname=slimphpmvc_demo', 'root', '123456789', $pdo_options);
        }
        return self::$instance;
    }
}
