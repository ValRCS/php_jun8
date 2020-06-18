<?php
class Controller
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function route()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->getReq();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->postReq();
        }
    }

    private function getReq()
    {
        $this->model->processData(["operation" => "get"]);
    }

    private function postReq()
    {
        echo "We got a POST request<hr>";
        var_dump($_POST);
    }
}
