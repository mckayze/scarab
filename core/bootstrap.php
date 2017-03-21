<?php

use Core\Router;

/**
 * This file, much like a real life contractor, is used to
 * require all the dependencies that will be needed
 * to boot the application.
 */
require('contractor.php');

/**
 * This method is responsible for initialising the check for
 * the requested URL. It check if the URl is registered
 * in the route.php file in the routes directory
 */
Router::checkUrlIsRegistered();