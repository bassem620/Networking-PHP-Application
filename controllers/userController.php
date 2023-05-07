<?php

require_once "../controllers/DBController.php";
class UserController
{
    protected $db;

    public function connect($user1_id, $user2_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "INSERT INTO connections VALUES ('$user1_id', '$user2_id', 0)";
            $result = $this->db->insert($query);
            if (!$result) {
                return false;
            }
            return true;
        }
        echo "Error in database connection";
        return false;
    }

    public function removeConnect($user1_id, $user2_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "DELETE FROM connections WHERE (user1_id = '$user1_id' AND user2_id = '$user2_id') OR (user1_id = '$user2_id' AND user2_id = '$user1_id')";
            $result = $this->db->delete($query);
            if (!$result) {
                return false;
            }
            return true;
        }
        echo "Error in database connection";
        return false;
    }

    public function acceptConnect($me_id, $user2_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "UPDATE  connections SET `state` = 1 WHERE user1_id = '$user2_id' AND user2_id = '$me_id'";
            $result = $this->db->update($query);
            if (!$result) {
                return false;
            }
            return true;
        }
        echo "Error in database connection";
        return false;
    }

    public function endorse($user1_id, $user2_id, $skill_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "INSERT INTO endorses VALUES ('$user1_id', '$user2_id', '$skill_id')";
            $result = $this->db->insert($query);
            if (!$result) {
                return false;
            }
            return true;
        }
        echo "Error in database connection";
        return false;
    }

    public function upgradeToPremium($user_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query1 = "UPDATE users SET profile_type = 1 WHERE id = '$user_id'";
            $result = $this->db->update($query1);
            if (!$result) {
                if (!isset($_SESSION["id"])) {
                    session_start();
                }
                $_SESSION["errMsg"] = "Couldn't update user profile";
                return false;
            }
            $startDate = date("Y-m-d");
            $endDate = Date('y:m:d', strtotime('+30 days'));
            $query2 = "INSERT INTO `premium` (`user_id`, `start_date`, `exp_date`) VALUES ('$user_id', '$startDate', '$endDate')";
            $result = $this->db->insert($query2);
            if (!$result) {
                if (!isset($_SESSION["id"])) {
                    session_start();
                }
                $_SESSION["errMsg"] = "Couldn't update user profile";
                return false;
            }
            $_SESSION["profileType"] = 1; 
            return true;
        }
        echo "Error in database connection";
        return false;
    }

    public function getNetworkUsers($user_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "SELECT id, firstName, lastName, profile_type, open_to  FROM users WHERE id <> '$user_id' AND id NOT IN ( SELECT user2_id FROM connections WHERE user1_id = '$user_id' UNION SELECT user1_id FROM connections WHERE user2_id = '$user_id');";
            $result = $this->db->select($query);
            if (!$result) {
                return false;
            }
            return $result;
        }
    }

    public function getUser($user_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "SELECT * FROM users WHERE id = '$user_id'";
            $result = $this->db->select($query);
            if (!$result) {
                return false;
            }
            return $result;
        }
    }

    public function checkConnection($user_id, $conn_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "SELECT `state` FROM connections WHERE (user1_id = $user_id AND user2_id = $conn_id) OR (user2_id = $user_id AND user1_id = $conn_id)";
            $result = $this->db->select($query);
            if (!$result) {
                return false;
            }
            return $result;
        }
    }
}
