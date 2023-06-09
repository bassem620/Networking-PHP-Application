<?php
require_once "../controllers/DBController.php";
class LearningController
{
    protected $db;

    public function getMyCourses($user_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "SELECT * FROM courses AS c INNER JOIN courses_users AS u ON c.course_id = u.course_id WHERE u.user_id = '$user_id'";
            $result = $this->db->select($query);
            if (!$result || count($result) == 0) {
                return false;
            }
            return $result;
        }
        echo "error in connection";
        return false;
    }

    public function getCourses($user_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "SELECT * FROM courses WHERE course_id NOT IN (SELECT course_id FROM courses_users WHERE user_id = '$user_id');";
            $result = $this->db->select($query);
            if (!$result || count($result) == 0) {
                return false;
            }
            return $result;
        }
        echo "error in connection";
        return false;
    }

    public function openEnrolledCourse($course_id, $user_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query1 = "select * from courses_users where course_id = $course_id AND user_id = $user_id";
            $result1 = $this->db->select($query1);
            if (!$result1 || count($result1) == 0) {
                return false;
            }
            $query2 = "select * from courses where course_id = $course_id";
            $result2 = $this->db->select($query2);
            if (!$result2 || count($result2) == 0) {
                return false;
            }
            return $result2;
        }
        echo "error in connection";
        return false;
    }

    public function enrollCourse($user_id, $course_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query0 = "SELECT * FROM courses_users WHERE course_id = $course_id AND user_id = $user_id";
            if (count($this->db->select($query0)) > 0) {
                $_SESSION["errMsg"] = "Already enrolled in this course";
                return false;
            }
            $query = "INSERT INTO courses_users VALUES ('$course_id', '$user_id');";
            if ($this->db->insert($query)) {
                return true;
            }
            $_SESSION["errMsg"] = "Course enrollment failed!";
            echo "error in enrollment";
            return false;
        }
        echo "error in connection";
        return false;
    }
}
