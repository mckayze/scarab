<?php

namespace Core;

class UrlHandler
{
    /**
     * @var $baseUri
     * The baseUri variable stores the base website name this
     * is set in the getRequestURI() method further down
     * the page
     */

    public static $baseUri;

    /**
     * @var $requestUri
     * The requestUri variable stores the Uri requested by
     * the user, this is then used to carry out a range
     * of tasks which end with a 404 or a view being
     * returned to the user
     */
    public static $requestUri;

    /**
     * The getRequestUri function sets the requested URI
     * of the user, its a void function that returns
     * nothing
     */
    public static function setRequestedUri()
    {
        # Replace '/directory/' with nothing in the full
        # requested uri
        self::$requestUri = str_replace(self::$baseUri, '', $_SERVER['REQUEST_URI']);

        # If the product of the above statement returns nothing
        # then scarab returns '/' to be used by the app
        (self::$requestUri == '' ? self::$requestUri = '/': false);
    }

    /**
     * @return mixed
     * Sets the base url of the site to whatever the current
     * application folder name is, then sets and returns
     * the requested URI
     */
    public static function getRequestUri()
    {
        self::$baseUri = getBaseUrl();
        self::setRequestedUri();
        return self::$requestUri;
    }
}