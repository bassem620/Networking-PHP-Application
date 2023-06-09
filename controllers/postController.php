<?php
require_once "../models/users/user.php";
require_once "../controllers/DBController.php";
require_once "../models/post/comment.php";
require_once "../models/post/post.php";
require_once "../models/group.php";

class PostController
{
    protected $db;

    // Comments
    public function addComment($user_id, $comment, $post_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "INSERT INTO `post_comments` (`post_id`, `user_id`, `comment`) VALUES ('$post_id','$user_id','$comment')";
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

    public function deleteComment($comment_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "delete from post_comments where id = '$comment_id' ";
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

    // Group Posts
    public function addPostGroup($user_id, $desc, $group_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "INSERT INTO `posts` (`id`, `user_id`, `group_id`, `desc`) VALUES (null , '$user_id', '$group_id' ,'$desc');";
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

    public function deletePostGroup($post_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "delete from posts where id = '$post_id' ";
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

    // Posts
    public function addPost($user_id, $desc, $group_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "INSERT INTO `posts` (`id`, `user_id`, `group_id`, `desc`) VALUES (null , '$user_id', null ,'$desc');";
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

    public function deletePost($post_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "delete from posts where id = '$post_id' ";
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


    public function addLike($user_id, $post_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "INSERT INTO post_likes(`post_id`, `user_id`) VALUES ('$post_id','$user_id')";
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

    public function unlike($post_id, $user_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "delete from post_likes where post_id='$post_id' and user_id='$user_id'";
            $result = $this->db->delete($query);
            if (!$result) {
                return false;
            }
            return $result;
        }
        echo "error in connection";
        return false;
    }

    public function getPosts($user_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "
            SELECT p.id, p.desc, users.firstName, users.lastName FROM posts AS p
            INNER JOIN users ON users.id = p.user_id
            WHERE p.group_id IS NULL AND ((p.user_id IN (
                SELECT `user1_id` AS id from `connections` WHERE `user2_id` = '$user_id' AND `state` = 1
                UNION
                select `user2_id` AS id from `connections` WHERE `user1_id` = '$user_id' AND `state` = 1
            )) OR p.user_id = '$user_id')
            ORDER BY id DESC;
            ";
            $result = $this->db->select($query);
            if (!$result || count($result) == 0) {
                return false;
            }
            return $result;
        }
        echo "error in connection";
        return false;
    }

    public function getComments($post_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "select `users`.`firstName` , `users`.`lastName` , `post_comments`.`comment` from post_comments inner join users on `users`.`id` = `post_comments`.`user_id` where `post_id` =" . $post_id . ";";
            $result = $this->db->select($query);
            if (!$result || count($result) == 0) {
                return null;
            }
            return $result;
        }
        echo "error in connection";
        return false;
    }
    public function getLikes($post_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "SELECT `users`.`firstName` , `users`.`lastName` , `users`.`id`from `post_likes` inner join `users` on `users`.`id` = `post_likes`.`user_id` where `post_likes`.`post_id` = " . $post_id . ";";
            $result = $this->db->select($query);
            if (!$result || count($result) == 0) {
                return null;
            }
            return $result;
        }
        echo "error in connection";
        return false;
    }
}
