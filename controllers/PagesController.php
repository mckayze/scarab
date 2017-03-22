<?php

namespace Controllers;


class PagesController
{
    public static function welcome()
    {
        $title = 'Welcome to scarab';
        $name  = 'Mckenzie';

        View('welcome', compact('title', 'name'));
    }
}