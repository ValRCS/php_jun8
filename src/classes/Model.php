<?php

class Model
{
    private $view;
    private $db;

    public function __construct($view)
    {
        $this->view = $view;
        $this->db = $this->createDB();
    }

    public function processData($incoming = null)
    {
        //process incoming
        $data = []; //empty array init
        switch ($incoming['operation']) {
            case "get":
                $data = $this->processGet($incoming);
                break;
        }
        //model
        $this->view->render($data);
    }

    private function processGet()
    {
        //here we would read data from db and return some data
        $stmt = $this->db->prepare("SELECT *
            FROM tracks
            WHERE userid = (?)");
        $stmt->bind_param("d", $_SESSION['id']); //s means string here
        $stmt->execute();
        $result = $stmt->get_result();
        $all_results = $result->fetch_all(MYSQLI_ASSOC);
        return $all_results;

    }

    private function createDB()
    {
        require_once __DIR__ . "/../../config/config.php";
        $conn = new mysqli($servername, $username, $password, $dbname);
        return $conn;
    }
}
