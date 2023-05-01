<?php

require_once "../controllers/DBController.php";
class EventController
{
    protected $db;

    public function createEvent($user_id, Event $event)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "INSERT INTO events values ('', '$event->title', '$event->desc', '$event->date', '$user_id')";
            $result = $this->db->insert($query);
            if (!$result) {
                return false;
            }
            return true;
        }
        echo "Error in database connection";
        return false;
    }

    public function deleteEvent($user_id, $Event_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "DELETE FROM events WHERE id = '$Event_id' AND user_id = '$user_id'";
            $result = $this->db->delete($query);
            if (!$result) {
                return  false;
            }
            return true;
        }
        echo "Error in database connection";
        return false;
    }

    public function goingEvent($user_id, $event_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "INSERT INTO events_going values ('$user_id', '$event_id')";
            $result = $this->db->insert($query);
            if (!$result) {
                return  false;
            }
            return true;
        }
        echo "Error in database connection";
        return false;
    }

    public function cancelGoingEvent($user_id, $event_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "DELETE FROM events_going WHERE user_id = '$user_id' AND event_id = '$event_id'";
            $result = $this->db->delete($query);
            if (!$result) {
                return  false;
            }
            return true;
        }
        echo "Error in database connection";
        return false;
    }

    public function getAllEvents($user_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "SELECT * FROM events WHERE user_id != '$user_id'";
            $result = $this->db->select($query);
            if (!$result) {
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
        if ($this->db->openConnection()) {
            $query = "SELECT * from events AS e INNER JOIN events_Going AS eg ON e.id=eg.event_id WHERE eg.user_id='$user_id'";
            $result = $this->db->select($query);
            if (!$result) {
                return false;
            }
            return $result;
        }
        echo "Error in database connection";
        return false;
    }

    public function getMyEvents($user_id)
    {
        $query = "SELECT * from events WHERE user_id='$user_id'";
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "SELECT * from events WHERE user_id='$user_id'";
            $result = $this->db->select($query);
            if (!$result) {
                return false;
            }
            return $result;
        }
        echo "Error in database connection";
        return false;
    }
}
