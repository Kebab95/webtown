<?php

/**
 * Created by PhpStorm.
 * User: kebab
 * Date: 2017.05.08.
 * Time: 12:23
 */
class ListPage extends Controller
{
    /**
     * listpage constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Required function
     * The Bootstrap call this when render View page
     * @return mixed
     */
    public function index()
    {
        $this->view->termekekList = $this->model->getTermekek();
        $this->view->render("listpage/index");
    }
}