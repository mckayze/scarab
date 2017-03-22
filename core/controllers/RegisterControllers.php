<?php

/**
 * This function takes each controller in the controllers
 * directory and makes it available in the application.
 * If your controller is not within the controllers
 * directory it will not be successfully registered.
 */
foreach(glob("controllers/*.php") as $controller)
{
    require(__DIR__.'/../../'.$controller);
}