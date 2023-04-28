<?php

require_once "../../models/users/user.php";
require_once "../../controllers/DBController.php";

class AuthController
{
    protected $db;

    public function login(User $user)
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            $query = "SELECT * FROM users WHERE email ='$user->email' AND password ='$user->password'";
            $result = $this->db->select($query);
            if(!$result || count($result) == 0)
            {
                session_start();
                $_SESSION["errMsg"] = "Wrong email or password. Please try again";
                return false;
            }
            session_start();
            $_SESSION["id"] = $result[0]["id"];
            $_SESSION["email"] = $result[0]["email"];
            $_SESSION["profileType"] = $result[0]["profile_type"];
            $_SESSION["openTo"] = $result[0]["open_to"];
            return true;
        }
        echo "Error in database connection";
        return false;
    }

    public function register(User $user)
    {
        $this->db=new DBController;
        if($this->db->openConnection())
        {
            $query="insert into users values ('','$user->firstName','$user->lastName','$user->email','$user->password','','','0','','')";
            $result=$this->db->insert($query);
            if($result!=false)
            {
                session_start();
                $_SESSION["id"] = $result;
                $_SESSION["email"] = $user->email;
                $_SESSION["profileType"] = 0;
                $this->db->closeConnection();
                return true;
            }
            $_SESSION["errMsg"]="Somthing went wrong... try again";
            $this->db->closeConnection();
            return false;
        }
        echo "Error in Database Connection";
        return false;
    }
}

?>