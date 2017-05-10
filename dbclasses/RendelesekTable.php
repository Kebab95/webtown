<?php

/**
 * Created by PhpStorm.
 * User: kebab
 * Date: 2017.05.10.
 * Time: 22:36
 */
class RendelesekTable extends TableClass
{
    static $tableName = "rendelesek";

    static $id = "id";
    static $name = "name";
    static $termek = "termekID";
    static $datab ="darab";
    static $ar = "ar";

    function __construct()
    {
        parent::__construct(array(
            self::$id,
            self::$name,
            self::$termek,
            self::$datab,
            self::$ar
        ));
    }
}