<?php

require_once "../../models/user.php";
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
            return true;
        }
        else
        {
            echo "Error in database connection";
            return false;
        }
    }

    public function register(User $user)
    {

    }
}

?>