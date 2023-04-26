<?php

require_once "../models/users/premium.php";
require_once "../controllers/DBController.php";

class PremiumConrtroller
{
    protected $db;

    public function hideConnections()
    {
        $this->db=new DBController;
        if($this->db->openConnection())
        {

        }
        echo "Error in Database Connection";
        return false;
    }

    public function exportConnections()
    {
        $this->db=new DBController;
        if($this->db->openConnection())
        {

        }
        echo "Error in Database Connection";
        return false;
    }

    public function cancelPremium(Premium $premium)
    {
        $this->db=new DBController;
        if($this->db->openConnection())
        {
            if(!isset($_SESSION["id"]))
            {
                session_start();
            }
            $query1 = "UPDATE users SET profile_type = 0 WHERE id = '$premium->id'";
            $query2 = "DELETE FROM premium WHERE user_id = '$premium->id'";
            $result1 = $this->db->update($query1);
            if(!$result1){
                return false;
            }
            $result2 = $this->db->delete($query2);
            if(!$result2){
                $query3 = "UPDATE users SET profile_type = 1 WHERE id = '$premium->id'";
                $this->db->update($query3);
                return false;
            }
            return true;
        }
        echo "Error in Database Connection";
        return false;
    }
}

?>