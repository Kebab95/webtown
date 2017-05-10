<?php

/**
 * Created by PhpStorm.
 * User: kebab
 * Date: 2017.05.08.
 * Time: 12:23
 */
class termekek extends Controller
{
    /**
     * termekek constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->view->addJSFile("termekek/js/default.js");
    }


    /**
     * Required function
     * The Bootstrap call this when render View page
     * @return mixed
     */
    public function index()
    {
        $this->view->termekekList = $this->model->getTermekek();
        $this->view->render("termekek/index");
    }
    public function getModal($id){
        $this->model->getModal($id);
    }

    public function addKosar($id, $db)
    {
        $this->model->addKosar($id,$db);
    }
}