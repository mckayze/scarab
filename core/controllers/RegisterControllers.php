<?php
/**
 * Created by PhpStorm.
 * User: mckenzie.flavius
 * Date: 02/03/2017
 * Time: 14:05
 */

foreach(glob("controllers/*.php") as $require)
{
    require(__DIR__.'/../../'.$require);
}