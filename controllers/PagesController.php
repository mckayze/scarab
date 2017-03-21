<?php
/**
 * Created by PhpStorm.
 * User: mckenzie.flavius
 * Date: 02/03/2017
 * Time: 13:56
 */

namespace Controllers;


class PagesController
{
    public static function welcome()
    {
        $title = 'Welcome to scarab';
        $name  = 'Mckenzie';
        $link  = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]about";

        View('welcome', compact('title', 'body', 'name', 'link'));
    }
}