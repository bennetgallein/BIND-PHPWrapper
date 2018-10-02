<?php
/**
 * Created by PhpStorm.
 * User: bennet
 * Date: 02.10.18
 * Time: 13:30
 */

use BIND\BIND;

include("vendor/autoload.php");

\Tracy\Debugger::enable();

$bind = new BIND("192.168.1.104");

//$suc = $bind->addRecord("test2.gallein2.de", "86400", "A", "192.168.1.2");

$a = $bind->getZone("gallein2.de")->getRecords();

dump($a);