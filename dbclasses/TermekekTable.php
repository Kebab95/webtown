<?php

/**
 * Created by PhpStorm.
 * User: kebab
 * Date: 2017.05.08.
 * Time: 16:05
 */
class TermekekTable extends TableClass
{

    static $tableName = "termekek";


    static $id = "id";
    static $name = "name";
    static $price = "price";
    static $megapack = "megapack";
    static $delete = "delete";

    /**
     * TermekekTable constructor.
     */
    public function __construct()
    {
        parent::__construct(
            array(
                self::$id,
                self::$name,
                self::$price,
                self::$megapack,
                self::$delete
            )
        );
    }

    /**
     * @return int|string
     */
    public function getId(): int
    {
        return parent::getValue(self::$id);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return parent::getValue(self::$name);
    }

    /**
     * @return int|string
     */
    public function getPrice(): int
    {
        return parent::getValue(self::$price);
    }

    /**
     * @return bool|string
     */
    public function isMegapack(): bool
    {
        return parent::getValue(self::$megapack)==1;
    }

    /**
     * @return bool|string
     */
    public function isDelete(): bool
    {
        return parent::getValue(self::$delete)==1;
    }




}