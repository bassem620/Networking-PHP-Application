<?php

class JobController
{
    protected $db;

    public function offerJob($user_id, Job $job)
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            $query = "INSERT INTO jobs VALUES ('', '$job->id', '$job->title','$job->desc','','$job->salary','$job->company','$job->location', '$user_id')";
            $result = $this->db->insert($query);
            if(!$result)
            {
                return false;
            }
            return true;
        }
        echo "Error in database connection";
        return false;
    }

    public function applyJob($user_id, $job_id)
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            $query0 = "SELECT * FROM applied_jobs WHERE user_id = '$user_id' AND job_id = '$job_id'";
            if(count($this->db->select($query0)) > 0)
            {
                if(!isset($_SESSION['id']))
                {
                    session_start();
                }
                $_SESSION["errMsg"] = "Already applied to this job";
                return false;
            }
            $query = "insert into applied_jobs values ('$user_id','$job_id')";
            $result = $this->db->insert($query);
            if(!$result)
            {
                return false;
            }
            return true;
        }
        echo "Error in database connection";
        return false;
    }


    public function deleteJob($user_id, $job_id)
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            $query = "DELETE from jobs where id = '$job_id' AND creator_id = '$user_id'";
            $result = $this->db->delete($query);
            if(!$result)
            {
                return false;
            }
            return true;
        }
        echo "Error in database connection";
        return false;
    }
}

?>