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

    public function addCertification($user_id, Certificate $cert)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "INSERT INTO certifications ( `user_id`, `name`, `organization`, `issue_date`, `exp_date`, `cred_id`, `cred_url`) VALUES ('$user_id','$cert->name','$cert->organization','$cert->issue_date','$cert->exp_date','$cert->cred_id','$cert->cred_url');";
            $result = $this->db->insert($query);
            if ($result) {
                return $result;
            }
            $_SESSION["errMsg"] = "Somthing went wrong... try again";
            $this->db->closeConnection();
            return false;
        }
        echo "Error in Database Connection";
        return false;
    }

    public function deleteCertification($user_id, $cert_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "DELETE FROM certifications WHERE user_id = '$user_id' AND cert_id = '$cert_id'";
            $result = $this->db->delete($query);
            if (!$result) {
                $_SESSION["errMsg"] = "Somthing went wrong... try again";
                $this->db->closeConnection();
                return false;
            }
            return true;
        }
        echo "Error in Database Connection";
        return false;
    }

    public function addEducation($user_id, Education $edu)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "INSERT INTO educations(`user_id`, `school`, `degree`, `field of study`, `start_date`, `end_date`, `grade`) VALUES ('$user_id','$edu->school','$edu->degree','$edu->field_of_study','$edu->start_date','$edu->end_date','$edu->grade')";
            $result = $this->db->insert($query);
            if ($result) {
                return $result;
            }
            $_SESSION["errMsg"] = "Somthing went wrong... try again";
            $this->db->closeConnection();
            return false;
        }
        echo "Error in Database Connection";
        return false;
    }

    public function deleteEducation($user_id, $edu_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "DELETE FROM educations WHERE user_id = '$user_id' AND id = '$edu_id' ";
            $result = $this->db->delete($query);
            if (!$result) {
                $_SESSION["errMsg"] = "Somthing went wrong... try again";
                $this->db->closeConnection();
                return false;
            }
            return true;
        }
        echo "Error in Database Connection";
        return false;
    }

    public function addPosition($user_id, Position $pos)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "INSERT INTO `positions` (`user_id`, `title`, `type`, `company`, `location`, `start_date`, `end_date`, `currently_working`, `industry`) VALUES ('$user_id','$pos->title','$pos->type','$pos->company','','$pos->start_date','$pos->end_date','$pos->currently_working','$pos->industry')";
            $result = $this->db->insert($query);
            if ($result) {
                return $result;
            }
            $_SESSION["errMsg"] = "Somthing went wrong... try again";
            $this->db->closeConnection();
            return false;
        }
        echo "Error in Database Connection";
        return false;
    }

    public function deletePosition($user_id, $pos_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "DELETE FROM positions WHERE user_id = '$user_id' AND id = '$pos_id' ";
            $result = $this->db->delete($query);
            if (!$result) {
                $_SESSION["errMsg"] = "Somthing went wrong... try again";
                $this->db->closeConnection();
                return false;
            }
            return true;
        }
        echo "Error in Database Connection";
        return false;
    }

    public function editProfile(User $user, Profile $pro)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "UPDATE users SET firstName='$user->firstName',lastName='$user->lastName', email='$user->email', password='$user->password', open_to = '$user->openTo', birthday='$pro->birthday', phone='$pro->phone', about='$pro->about' WHERE id='$user->id'";
            $result = $this->db->insert($query);
            if ($result) {
                return $result;
            }
            $_SESSION["errMsg"] = "Somthing went wrong... try again";
            $this->db->closeConnection();
            return false;
        }
        echo "Error in Database Connection";
        return false;
    }

    public function getAllSkills($user_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "SELECT * FROM skills WHERE id NOT IN (SELECT skill_id FROM user_skills WHERE skill_id != $user_id)";
            $result = $this->db->select($query);
            if (!$result) {
                return false;
            }
            return $result;
        }
    }

    public function getMySkills($user_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "SELECT * FROM skills WHERE id IN (SELECT skill_id FROM user_skills WHERE skill_id != $user_id)";
            $result = $this->db->select($query);
            if (!$result) {
                return false;
            }
            return $result;
        }
    }

    public function addSkill($user_id, $skill_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "INSERT INTO user_skills(user_id, skill_id) VALUES ('$user_id', '$skill_id')";
            $result = $this->db->insert($query);
            if ($result) {
                return $result;
            }
            $_SESSION["errMsg"] = "Somthing went wrong... try again";
            $this->db->closeConnection();
            return false;
        }
        echo "Error in Database Connection";
        return false;
    }

    public function deleteSkill($user_id, $skill_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "DELETE FROM user_skills WHERE skill_id = '$skill_id' AND user_id='$user_id'";
            $result = $this->db->delete($query);
            if (!$result) {
                $_SESSION["errMsg"] = "Somthing went wrong... try again";
                $this->db->closeConnection();
                return false;
            }
            return true;
        }
        echo "Error in Database Connection";
        return false;
    }

    public function addWebsite($user_id, Website $web)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "INSERT INTO websites (`user_id`, `link`, `type`) VALUES ('$user_id', '$web->link', '$web->type')";
            $result = $this->db->insert($query);
            if ($result) {
                return $result;
            }
            $_SESSION["errMsg"] = "Somthing went wrong... try again";
            $this->db->closeConnection();
            return false;
        }
        echo "Error in Database Connection";
        return false;
    }

    public function deleteWebsite($user_id, $web_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "DELETE FROM websites where user_id = '$user_id' AND id= '$web_id'";
            $result = $this->db->delete($query);
            if (!$result) {
                $_SESSION["errMsg"] = "Somthing went wrong... try again";
                $this->db->closeConnection();
                return false;
            }
            return true;
        }
        echo "Error in Database Connection";
        return false;
    }

    public function getConnections($user_id){
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query1 = "SELECT `users`.`firstName`, `users`.`lastName` FROM users INNER join connections on `users`.`id`= `connections`.`user2_id` where `connections`.`user1_id` = '$user_id' AND `state` = 1;";
            $result1 = $this->db->select($query1);
            $query2 = "SELECT `users`.`firstName`, `users`.`lastName` FROM users INNER join connections on `users`.`id`= `connections`.`user1_id` where `connections`.`user2_id` = '$user_id' AND `state` = 1;";
            $result2 = $this->db->select($query2);
            $result = array_merge($result1, $result2);
            if (!$result) {
                return false;
            }
            return $result;
        }
    }
}
