<?php

namespace Core;

use Controllers\PagesController;
use Core\Router;

require('helpers/Helpers.php');
require('router/Router.php');
require('controllers/RegisterControllers.php');
require(__DIR__.'/../routes/route.php');
Router::checkUrlIsRegistered();

