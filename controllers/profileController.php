<?php

require_once "../controllers/DBController.php";
require_once "../models/users/user.php";
require_once "../models/profile/certificate.php";

class ProfileController 
{
    protected $db;

    public function insertCertification(User $user, Certificate $cert)
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            $query="INSERT INTO certifications ( `user_id`, `name`, `organization`, `issue_date`, `exp_date`, `cred_id`, `cred_url`) VALUES ('','','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]');";
            $result=$this->db->insert($query);
            if($result)
            {
                return $result;
            }
            $_SESSION["errMsg"]="Somthing went wrong... try again";
            $this->db->closeConnection();
            return false;
        }
        echo "Error in Database Connection";
        return false;
    }

    public function delete(User $user, Certificate $cert)
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            $query="delete from certifications where cert_id = '$cert->id' ";
            $result=$this->db->delete($query);
            if(!$result)
            {
                $_SESSION["errMsg"]="Somthing went wrong... try again";
            $this->db->closeConnection();
                return false;
            }
            return true;
        }
        echo "Error in Database Connection";
        return false;
    }

    }
?>