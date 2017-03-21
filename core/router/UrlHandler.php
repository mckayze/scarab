<?php
/**
 * Created by PhpStorm.
 * User: mckenzie.flavius
 * Date: 02/03/2017
 * Time: 11:42
 */

namespace Core;

class UrlHandler
{
    /**
     * @var $baseUri
     * The baseUri variable stores the base website name,
     * don't forget to change this when you need.
     */

    public static $baseUri;

    /**
     * @var $requestUri
     * The requestUri variable stores the Uri requested by the user,
     */
    public static $requestUri;

    /**
     * @func
     * The getRequestUri function sets the user requested Uri
     */
    public static function setRequestedUri()
    {
        self::$requestUri = str_replace(self::$baseUri, '', $_SERVER['REQUEST_URI']);

        (self::$requestUri == '' ? self::$requestUri = '/': false);
    }

    public static function getRequestUri()
    {
        self::$baseUri = getBaseUrl();
        self::setRequestedUri();
        return self::$requestUri;
    }
}