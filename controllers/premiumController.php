<?php

require_once "../models/users/premium.php";
require_once "../controllers/DBController.php";
require_once "../controllers/fpdf/fpdf.php";

class PremiumConrtroller
{
    protected $db;

    public function hideConnections($premium_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "UPDATE users SET profile_type = 2 WHERE id = '$premium_id'";
            $result = $this->db->update($query);
            if (!$result) {
                return false;
            }
            $_SESSION["profileType"] = 2; 
            return true;
        }
        echo "Error in Database Connection";
        return false;
    }

    public function showConnections($premium_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "UPDATE users SET profile_type = 1 WHERE id = '$premium_id'";
            $result = $this->db->update($query);
            if (!$result) {
                return false;
            }
            $_SESSION["profileType"] = 1; 
            return true;
        }
        echo "Error in Database Connection";
        return false;
    }

    public function exportConnections($user_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query1 = "SELECT `users`.`firstName`, `users`.`lastName` FROM users INNER join connections on `users`.`id`= `connections`.`user2_id` where `connections`.`user1_id` = '$user_id';";
            $result1 = $this->db->select($query1);
            $query2 = "SELECT `users`.`firstName`, `users`.`lastName` FROM users INNER join connections on `users`.`id`= `connections`.`user1_id` where `connections`.`user2_id` = '$user_id';";
            $result2 = $this->db->select($query2);
            $result = array_merge($result1, $result2);
            ob_end_clean();
            $pdf = new FPDF();
            // Define alias for number of pages
            $pdf->AddPage();
            $pdf->SetFont('Times', '', 14);
            $counter = 1;
            foreach ($result as $row) {
                $pdf->Cell(0, 10, $counter . ") "
                    . $row["firstName"] . " " . $row["lastName"], 0, 1);
                $counter++;
            }
            $pdf->Output();
        }
        echo "Error in Database Connection";
        return false;
    }

    public function cancelPremium($premium_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            if (!isset($_SESSION["id"])) {
                session_start();
            }
            $query1 = "UPDATE users SET profile_type = 0 WHERE id = '$premium_id'";
            $query2 = "DELETE FROM premium WHERE user_id = '$premium_id'";
            $result1 = $this->db->update($query1);
            if (!$result1) {
                return false;
            }
            $result2 = $this->db->delete($query2);
            if (!$result2) {
                return false;
            }
            $_SESSION["profileType"] = 0; 
            return true;
        }
        echo "Error in Database Connection";
        return false;
    }
}
