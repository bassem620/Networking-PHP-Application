<?php

class JobController
{
    protected $db;

    public function offerJob(User $user, $job_id, $title, $desc, $salary, $company, $location)
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

    public function applyJob(User $user, $job_id)
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

    public function deleteJob(User $user, $job_id)
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