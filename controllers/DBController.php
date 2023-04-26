<?php 

class DBController
{
    public $dbHost = "localhost";
    public $dbUser = "root";
    public $dbPassword = "";
    public $dbName = "linkedin";
    public $connection;

    public function openConnection()
    {
        $this->connection = new mysqli($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
        if($this->connection->connect_error)
        {
            echo "Error in connection : " . $this->connection->error;
            return false;
        } 
        return true;
    }

    public function closeConnection()
    {
        if($this->connection)
        {
            $this->connection->close();
        }
        echo "Connection already closed";
    }

    public function select($qry)
    {
        $result = $this->connection->query($qry);
        if(!$result)
        {
            echo "Error : " . mysqli_error($this->connection);
            return false;
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insert($qry)
    {
        $result=$this->connection->query($qry);
        if(!$result)
        {
            echo "Error : " . mysqli_error($this->connection);
            return false;
        }
        return $this->connection->insert_id;
    }

    public function update($qry)
    {
        $result=$this->connection->query($qry);
        if(!$result)
        {
            echo "Error : " . mysqli_error($this->connection);
            return false;
        }
        return true;
    }
    
    public function delete($qry)
    {
        $result=$this->connection->query($qry);
        if(!$result)
        {
            echo "Error : ". mysqli_error($this->connection);
            return false;
        }
        return $result;
    }
}

?>