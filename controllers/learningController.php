<?php
require_once "../../controllers/DBController.php";
class courses{
    protected $db;

    public function getCourses(){
        $this->db = new DBController;
        if($this->db->openConnection()){
            $query = "select * from courses";
            $result = $this->db->select($query);
            return $result;
        }
        echo "error in connection";
        return;
    }
}
?>