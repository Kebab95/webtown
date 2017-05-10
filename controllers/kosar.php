<?php

/**
 * Created by PhpStorm.
 * User: kebab
 * Date: 2017.05.08.
 * Time: 23:55
 */
class kosar extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->view->addJSFile("kosar/js/default.js");
    }

    /**
     * Required function
     * The Bootstrap call this when render View page
     * @return mixed
     */
    public function index()
    {

        $array  = Session::issetVal("kosar")?Session::get("kosar"):null;
        if ($array!=null){
            $array = $this->model->getKosarTableData($array);
        }

        $this->view->kosarArray = $array;
        $this->view->render("kosar/index");
    }

    public function deleteTermek($key)
    {
        $this->model->deleteTermek($key);
        $this->model->getAJAXTable();
    }
}