<?php

namespace Core;

/**
 * The helpers file is a file that is filled with all sorts
 * of different functions that are implemented throughout
 * the entire framework, the functions in here are core
 * and should never be changed or tampered with,
 * unless you know exactly what you're doing
 */
require('helpers/Helpers.php');

/**
 * The router file is responsible for all routing that takes
 * place in the application, its a fairly simple router
 * that reads a requests and fires an action based
 * on that request
 */
require('router/Router.php');

/**
 * The this register controllers class is used to register
 * all controllers within the application, when you create
 * a new controller it will be automatically added to the
 * list of available controllers via this method
 */
require('controllers/RegisterControllers.php');

/**
 * The route class file is used to link routes to their
 * controllers in your application, this can consists
 * of as many different urls as you need. Adding
 * a URL /controller combination here will
 * stop 404 errors from displaying when
 * you access a new URL
 */
require(__DIR__.'/../routes/route.php');



