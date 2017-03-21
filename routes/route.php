<?php

use Core\Router;

/**
 * Here is where you register all of your routes for your
 * application, be sure to register each one to its
 * appropriate URL and controller or else scarab
 * will not be able to return the correct view
 */
Router::register('/', 'PagesController@welcome');
