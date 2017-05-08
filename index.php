<?php
define("ROOT", __DIR__ . DIRECTORY_SEPARATOR);

require "config.php";

/**
 * Auto load classes
 * @param $class
 */
function __autoload($class)
{
    if (file_exists(ROOT.LIBS.$class.".php")){
        require ROOT.LIBS . $class . ".php";
    }

    if (file_exists(ROOT.DBCLASSES.$class.".php")){
        require ROOT.DBCLASSES . $class . ".php";
    }
}
$app = new Bootstrap();
