<?php

class SearchController
{
    protected $db;

    public function searchMember(User $user, $text)
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

    public function searchJob(User $user, $text)
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

    public function searchEvent(User $user, $text)
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

    public function searchGroup(User $user, $text)
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
}

?>