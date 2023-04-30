<?php

require_once "../controllers/DBController.php";
class GroupController
{
    protected $db;

    public function createGroup($user_id, Group $grp)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "INSERT INTO group values ('', '$grp->name', 0, '$user_id')";
            $result = $this->db->insert($query);
            if (!$result) {
                return false;
            }
            return true;
        }
        echo "Error in database connection";
        return false;
    }

    public function deleteGroup($grp_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "DELETE FROM groups WHERE id = '$grp_id'";
            $result = $this->db->delete($query);
            if (!$result) {
                return  false;
            }
            return true;
        }
        echo "Error in database connection";
        return false;
    }

    public function joinGroup($user_id, $group_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "INSERT INTO joined_groups values ('$user_id', '$group_id')";
            $result = $this->db->insert($query);
            if (!$result) {
                return  false;
            }
            return true;
        }
        echo "Error in database connection";
        return false;
    }

    public function getAllGroups()
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "SELECT * FROM groups";
            $result = $this->db->select($query);
            if (!$result) {
                return false;
            }
            return $result;
        }
        echo "Error in database connection";
        return false;
    }

    public function getJoinedGroups($user_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "SELECT * from groups INNER JOIN joined_groups ON id=group_id WHERE user_id='$user_id'";
            $result = $this->db->select($query);
            if (!$result) {
                return false;
            }
            return $result;
        }
        echo "Error in database connection";
        return false;
    }

    public function getMyGroups($user_id)
    {
        $query = "SELECT * from groups WHERE user_id='$user_id'";
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "SELECT * from groups WHERE user_id='$user_id'";
            $result = $this->db->select($query);
            if (!$result) {
                return false;
            }
            return $result;
        }
        echo "Error in database connection";
        return false;
    }
}
