<?php
require_once "../controllers/DBController.php";
class Course{
    protected $db;

    public function getCourses(){
        $this->db = new DBController;
        if($this->db->openConnection()){
            $query = "select * from courses";
            $result = $this->db->select($query);
            if(!$result)
            {
                return false;
            }
            return $result;
        }
        echo "error in connection";
        return false;
    }
}
?>