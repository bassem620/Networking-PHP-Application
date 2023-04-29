<?php
require_once "../models/users/user.php";
require_once "../controllers/DBController.php";
require_once "../models/post/comment.php";
require_once "../models/post/post.php";
require_once "../models/group.php";

class postController
{
    protected $db;  
    public function addComment(User $user, Comment $comm, post $post)
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            $query="INSERT INTO post_comments(`post_id`, `user_id`, `comment`) VALUES ('$post->post_id','$user->user_id','$comm->comment')";
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

    public function deleteComment(User $user, Comment $comm, post $post)
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            $query="delete from post_comments where id = '$user->id' ";
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

//////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function addPostGroup(User $user, post $post, group $group)
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            $query="INSERT INTO `posts`(`user_id`, `group_id`, `desc`, `media_url`, `visibility`) VALUES ('$user->user_id','$group->group_id','$post->desc','$post->meda_url','$post->visibility')";
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

    public function deletePostGroup(User $user, group $group , post $post)
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            $query="delete from posts where id = '$post->id' ";
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
/////////////////////////////////////////////////////////////////////////////////////////////////////

public function addPost(User $user, post $post)
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            $query="INSERT INTO `posts`(`user_id`, `desc`, `media_url`, `visibility`) VALUES ('$user->user_id','$post->desc','$post->meda_url','$post->visibility')";
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

    public function deletePost(User $user, post $post)
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            $query="delete from posts where id = '$post->id' ";
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