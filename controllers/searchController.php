<?php

class SearchController
{
    protected $db;

    public function searchMember($user_id, $text)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "SELECT * FROM users WHERE firstName LIKE '%$text%' OR lastName LIKE '%$text%' AND id != '$user_id'";
            $result = $this->db->select($query);
            if(!$result) {
                return false;
            }
            return $result;
        }   
    }
}