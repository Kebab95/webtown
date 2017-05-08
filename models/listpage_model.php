<?php

/**
 * Created by PhpStorm.
 * User: kebab
 * Date: 2017.05.08.
 * Time: 16:09
 */
class listpage_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }
    public function getTermekek(){
        return $this->db->SQLSelectToClass("TermekekTable","termekek");
    }
}