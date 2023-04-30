<?php

require_once "../controllers/DBController.php";
require_once "../models/users/user.php";
require_once "../models/profile/certificate.php";
require_once "../models/profile/education.php";
require_once "../models/profile/position.php";
require_once "../models/profile/profile.php";
require_once "../models/profile/skill.php";
require_once "../models/profile/website.php";

class ProfileController 
{
    protected $db;

    public function insertCertification(User $user, Certificate $cert)
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            $query="INSERT INTO certifications ( `user_id`, `name`, `organization`, `issue_date`, `exp_date`, `cred_id`, `cred_url`) VALUES ('$user-> user_id','$cert-> name','$cert->organization','$cert->issue_date','$cert->exp_date','$cert->cred_id','$cert->cred_url');";
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

    public function deleteCertification(User $user, Certificate $cert)
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
    public function inserteducation(User $user, education $educ)
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            $query="INSERT INTO educations(`user_id`, `school`, `degree`, `field of study`, `start_date`, `end_date`, `grade`) VALUES ('$user -> user_id','$educ->school','$educ->degree','$educ-> field of study','$educ->start_date','$educ->end_date','$educ->grade')";
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

    public function deleteeducation(User $user, education $educ )
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            $query="delete from educations where id = '$educ->id' ";
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
    public function insertposition(User $user, position $pos)
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            $query="INSERT INTO `positions`(`user_id`, `title`, `type`, `company`, `location`, `start_date`, `end_date`, `currently_working`, `industry`) VALUES ('$user-> user_id','$pos->title','$pos->type','$pos->company','$pos->location','$pos->start_date','$pos->end_date','$pos->currently_working','$pos->industry')";
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

    public function deleteposition(User $user, position $pos )
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            $query="delete from positions where id = '$pos->id' ";
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
    public function insertprofile(User $user, profile $pro)
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            $query="INSERT INTO users(`firstName`, `lastName`, `email`, `password`, `birthday`, `phone`, `about`) VALUES ('$user->firstName','$user->lastName','$user->email','$user->password','$pro->birthday','$pro->phone','$pro->about')";
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

    public function deleteprofile(User $user, profile $pro)
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            $query="delete from users where id = '$user->id' ";
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
    public function insertskill(User $user, skill $ski)
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            $query="INSERT INTO skills(`name`) VALUES ('$ski-> name')";
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

    public function deleteskill(User $user, skill $ski)
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            $query="delete from skills where id = '$ski-> skill_id'and user_id='$user-> user_id'";
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
    public function insertwebsite(User $user, website $web)
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            $query="INSERT INTO websites(`user_id`, `link`, `type`) VALUES ('$user-> user_id','$web->link','$web->type')";
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

    public function deletewebsite(User $user, website $web)
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            $query="delete from websites where id = '$user->id' ";
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