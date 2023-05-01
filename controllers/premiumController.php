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
            ob_end_clean();
            $pdf = new FPDF();
            // Define alias for number of pages
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->SetFont('Times', '', 14);

            for ($i = 1; $i <= 30; $i++)
                $pdf->Cell(0, 10, 'line number '
                    . $i, 0, 1);
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
