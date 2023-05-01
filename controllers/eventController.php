<?php

require_once "../controllers/DBController.php";
class EventController
{
    protected $db;

    public function createEvent($user_id, Event $event)
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            $query = "INSERT INTO events values ('', '$event->title', '$event->desc', '$event->date', '$user_id')";
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

public function deleteEvent($Event_id)
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            $query = "DELETE FROM events WHERE id = '$Event_id'";
            $result = $this->db->delete($query);
            if(!$result)
            {
                return  false;
            }
            return true;
        }
        echo "Error in database connection";
        return false;
    }

    public function events_Going($user_id, $event_id)
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            $query = "INSERT INTO events_Going values ('$user_id', '$event_id')";
            $result = $this->db->insert($query);
            if(!$result)
            {
                return  false;
            }
            return true;
        }
        echo "Error in database connection";
        return false;
    }

    public function getAllEvents()
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            $query = "SELECT * FROM events";
            $result = $this->db->select($query);
            if(!$result)
            {
                return false;
            }
            return $result;
        }
        echo "Error in database connection";
        return false;
    }

    public function getGoingEvents($user_id)
    {
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            $query = "SELECT * from events INNER JOIN events_Going ON id=event_id WHERE user_id='$user_id'";
            if(!$this->db->select($query))
            {
                return false;
            }
            return true;
        }
        echo "Error in database connection";
        return false;
    }

    public function getMyEvents($user_id)
    {
        $query = "SELECT * from events WHERE user_id='$user_id'";
        $this->db = new DBController;
        if($this->db->openConnection())
        {
            $query = "SELECT * from events WHERE user_id='$user_id'";
            $result = $this->db->select($query);
            if(!$result)
            {
                return false;
            }
            return $result;
        }
        echo "Error in database connection";
        return false;
    }
}

?>