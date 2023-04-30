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
        if($this->db->openConnection())
        {
            $query="INSERT INTO post_comments(`post_id`, `user_id`, `comment`) VALUES ('$post_id','$user_id','$comment')";
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

    public function deleteComment($comment_id)
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            $query="delete from post_comments where id = '$comment_id' ";
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

    // Group Posts
    public function addPostGroup($user_id, Post $post, $group_id)
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            $query="INSERT INTO `posts`(`user_id`, `group_id`, `desc`, `media_url`, `visibility`) VALUES ('$user_id','$group_id','$post->desc','$post->mediaUrl','$post->visibility')";
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

    public function deletePostGroup($post_id)
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            $query="delete from posts where id = '$post_id' ";
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

    // Posts
    public function addPost($user_id, Post $post)
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            $query="INSERT INTO `posts`(`user_id`, `desc`, `media_url`, `visibility`) VALUES ('$user_id','$post->desc','$post->mediaUrl','$post->visibility')";
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

    public function deletePost($post_id)
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            $query="delete from posts where id = '$post_id' ";
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


    public function addLike($user_id, $post_id)
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            $query="INSERT INTO post_likes(`post_id`, `user_id`) VALUES ('$post_id','$user_id')";
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

    public function unlike($post_id , $user_id)
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            $query="delete from post_likes where post_id='$post_id' and user_id='$user_id'";
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