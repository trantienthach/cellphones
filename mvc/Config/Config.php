<?php
class Config
{
    protected $controllerConfig = "Home";
    protected $actionConfig     = "index";

    public static $base_url_admin  = "http://localhost/admin/";
    public static $base_url_client = "http://localhost/admin/";

    // public static $base_url_client = "https://trantienthach.com/";
    // public static $base_url_admin  = "https://trantienthach.com/admin/";

    public static function getBaseUrlAdmin($url = null)
    {
        return self::$base_url_admin . $url;
    }

    public static function getBaseUrlClient($url = null)
    {
        return self::$base_url_client . $url;
    }

    protected function fileAutoLoadClass()
    {
        return [
            "Database",
            "BaseController",
            "Database",
            "BaseController",
            "Validation",
            "Session",
            "Cookie",
            "Helper",
            "Auth"
        ];
    }

    protected function fileAutoLoadFunc()
    {
        return [
            "BaseView"
        ];
    }

    protected function fileAutoLoadModel()
    {
        return [
        ];
    }

    protected function fileAutoLoadController()
    {
        return [
        ];
    }
}
