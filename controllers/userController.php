<?php

require_once "../../controllers/DBController.php";
class UserController
{
    protected $db;

    public function connect(User $user, $user_id)
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            //  Code
            return true;
        }
        echo "Error in database connection";
        return false;
    }

    public function removeConnect(User $user, $user_id)
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            //  Code
            return true;
        }
        echo "Error in database connection";
        return false;
    }

    public function acceptConnect(User $user, $user_id)
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            //  Code
            return true;
        }
        echo "Error in database connection";
        return false;
    }

    public function endorse(User $user, $user_id, $skill)
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            //  Code
            return true;
        }
        echo "Error in database connection";
        return false;
    }

    public function upgradeToPremium(User $user)
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            $query1 = "UPDATE users SET profile_type = 1 WHERE id = '$user->id'";
            $result = $this->db->update($query1);
            if(!$result)
            {
                if(!isset($_SESSION["id"]))
                {
                    session_start();
                }
                $_SESSION["errMsg"] = "Couldn't update user profile";
                return false;
            }
            $query2 = "INSERT INTO premium values ('$user->id',  , )";
            // 1 => Premium
            return true;
        }
        echo "Error in database connection";
        return false;
    }
}

?>