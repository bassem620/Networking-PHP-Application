<?php

require_once "../controllers/DBController.php";
class GroupController
{
    protected $db;

    public function createGroup($user_id, Group $grp)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "INSERT INTO groups values ('', '$grp->name', '$grp->desc' , '$user_id')";
            $result = $this->db->insert($query);
            if (!$result) {
                return false;
            }
            return true;
        }
        echo "Error in database connection";
        return false;
    }

    public function deleteGroup($user_id, $grp_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "DELETE FROM groups WHERE id = '$grp_id' AND user_id = '$user_id'";
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

    public function leaveGroup($user_id, $group_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "DELETE FROM joined_groups WHERE user_id = '$user_id' AND group_id = '$group_id'";
            $result = $this->db->delete($query);
            if (!$result) {
                return  false;
            }
            return true;
        }
        echo "Error in database connection";
        return false;
    }

    public function getAllGroups($user_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            // $query = "SELECT * FROM events WHERE id NOT IN (SELECT event_id FROM events_going WHERE user_id = '$user_id') AND user_id != '$user_id'";
            $query = "SELECT * FROM groups AS g WHERE id NOT IN (SELECT group_id FROM joined_groups WHERE user_id = '$user_id') AND g.user_id != '$user_id';";
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
            $query = "SELECT * FROM groups AS g INNER JOIN joined_groups AS jg ON g.id = jg.group_id WHERE jg.user_id = '$user_id';";
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
