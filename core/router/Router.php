<?php
namespace Core;

use Controllers;

require('UrlHandler.php');


class Router
{
    /**
     * @var array
     *
     * This array represents all of the routes that can be
     * accessed in the route.php file
     */
    public static $accessibleRoutes = [];

    /**
     * @param $url
     * @param $controller
     *
     * Fires a method within the class that adds a key value pair
     * item to the array for later checks in the application
     */
    public static function register($url, $controller)
    {
        self::addUrlToAccessibleRoutes($url, $controller);
    }

    /**
     * @param $url
     * @param $controller
     *
     * This function adds each url and controller from route.php
     * to the $accessibleRoutes array for later use in the
     * application
     */
    public static function addUrlToAccessibleRoutes($url, $controller)
    {
        self::$accessibleRoutes[$url] = $controller;
    }

    /**
     * This method is responsible for checking if the requested URL
     * is registered or not. It uses the class UrlHandler to
     * get and set the requested URL and returns a view
     * based on the requests (404 or the actual view)
     */
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

    /**
     * @param $value
     * @return mixed|string
     *
     * This function is used to change a string from the route.php
     * file into a string that is reeadable and executable
     * by PHP. It changes the method name into a fully
     * functional method call out which is later
     * executed in the PHP script
     */
    public static function convertValueToPHP($value)
    {
        $value = str_replace('@', '::', $value);
        $value.= '();';
        return $value;
    }
}