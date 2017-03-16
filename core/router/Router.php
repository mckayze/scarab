<?php
/**
 * Created by PhpStorm.
 * User: mckenzie.flavius
 * Date: 02/03/2017
 * Time: 11:35
 */

namespace Core;

use Controllers;

require('UrlHandler.php');


class Router
{

    public static $accessibleRoutes = [];

    public static function register($url, $controller)
    {
        self::addUrlToAccessibleRoutes($url, $controller);
    }

    public static function addUrlToAccessibleRoutes($url, $controller)
    {
        self::$accessibleRoutes[$url] = $controller;
    }

    public static function checkUrlIsRegistered()
    {
        $requestedUri = UrlHandler::getRequestUri();
        if(array_key_exists($requestedUri, self::$accessibleRoutes))
        {
            eval("Controllers\\". self::convertValueToPHP(self::$accessibleRoutes[$requestedUri]));
        }
        else
        {
            display404($requestedUri);
        }
    }

    public static function convertValueToPHP($value)
    {
        $value = str_replace('@', '::', $value);
        $value.= '();';
        return $value;
    }
}