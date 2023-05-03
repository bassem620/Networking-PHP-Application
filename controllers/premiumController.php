<?php

require_once "../models/users/premium.php";
require_once "../controllers/DBController.php";
require_once "../controllers/fpdf/fpdf.php";

class PremiumConrtroller
{
    protected $db;

    public function hideConnections(Premium $premium)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query = "UPDATE users SET profile_type = 2 WHERE id = '$premium->id'";
            $result = $this->db->update($query);
            if (!$result) {
                return false;
            }
            return true;
        }
        echo "Error in Database Connection";
        return false;
    }

    public function exportConnections($user_id)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            $query1 = "SELECT `users`.`firstName`, `users`.`lastName` FROM users INNER join connections on `users`.`id`= `connections`.`user2_id` where `connections`.`user1_id` = 1;";
            $result1 = $this->db->select($query1);
            $query2 = "SELECT `users`.`firstName`, `users`.`lastName` FROM users INNER join connections on `users`.`id`= `connections`.`user1_id` where `connections`.`user2_id` = 1;";
            $result2 = $this->db->select($query2);
            $result=array_merge($result1, $result2);
            ob_end_clean();
            $pdf = new FPDF();
            // Define alias for number of pages
            $pdf->AddPage();
            $pdf->SetFont('Times', '', 14);
            $counter=1;
             foreach ($result as $row){
                $pdf->Cell(0, 10, $counter.") "
                    . $row["firstName"]." " . $row["lastName"], 0, 1);
                $counter++;}
            $pdf->Output();
        }
        echo "Error in Database Connection";
        return false;
    }

    public function cancelPremium(Premium $premium)
    {
        $this->db = new DBController;
        if ($this->db->openConnection()) {
            if (!isset($_SESSION["id"])) {
                session_start();
            }
            $query1 = "UPDATE users SET profile_type = 0 WHERE id = '$premium->id'";
            $query2 = "DELETE FROM premium WHERE user_id = '$premium->id'";
            $result1 = $this->db->update($query1);
            if (!$result1) {
                return false;
            }
            $result2 = $this->db->delete($query2);
            if (!$result2) {
                $query3 = "UPDATE users SET profile_type = 1 WHERE id = '$premium->id'";
                $this->db->update($query3);
                return false;
            }
            return true;
        }
        echo "Error in Database Connection";
        return false;
    }
}
