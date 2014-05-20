<?php
define('FPDF_FONTPATH','font/');
include 'fpdf.php';


    class PDF extends FPDF {

// Page header
        function Header() {
            // Logo
            $this->Image(base_url() . "assets/img/download.png", 12, 8, 25, 25);
            // Arial bold 15
            $this->SetFont('Arial', 'B', 15);
            $this->Cell(200, 6, 'KEMENTERIAN PENDIDIKAN NASIONAL', 0, 1, 'C', FALSE);
            $this->Cell(200, 6, 'UNIVERSITAS JEMBER', 0, 1, 'C', FALSE);
            $this->SetFont('times', '', 12);
            $this->Cell(200, 6, 'Jl. Kalimantan 37 Kampus Tegal Boto Kotak Pos 159', 0, 1, 'C', FALSE);
            $this->Cell(200, 6, 'Telp. (0331)-330224, 336579, 336580, 333147, 334267, 339029 Fax. (0331)-339029', 0, 1, 'C', FALSE);
            $this->Line(10, 35, 200, 35);
            $this->Ln(10);
        }

// Page footer
        function Footer() {
            //Position at 1.5 cm from bottom
            $this->SetY(-15);
            //Arial italic 8
            $this->SetFont('Arial', 'I', 8);
            //Page number
            $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
        }

    }

// Instanciation of inherited class
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times', 'B', 12);
    $pdf->Cell(190, 6, 'DATA NILAI MAHASISWA', 0, 1, 'C', FALSE);
    $pdf->Ln();
    $pdf->SetMargins(3.5, 5);
    $pdf->SetFont('Times', '', 12);
    $pdf->Cell(10, 10, "- Minggu Ke : K" . $nilai_simultan->minggu_ke, 0, 1, 'L', FALSE);
    $pdf->SetFont('times', 'B', 10);
    $pdf->SetFillColor(176, 170, 255);
    $pdf->Cell(6, 6, 'No', 1, 0, 'C', TRUE);
    $pdf->Cell(35, 6, 'NIM', 1, 0, 'C', TRUE);
      $pdf->Cell(50, 6, 'NAMA', 1, 0, 'C', TRUE);
  
    $a = 1;
    foreach ($judul_kolom as $row) {
        $pdf->Cell(35, 6, $row->keterangan, 1, 0, 'C', TRUE);
        if ($a == count($judul_kolom)) {
            $pdf->Ln();
        }
        $a++;
    }
    $pdf->SetFont('times', '', 9);
    $no = 1;
    $t = 1;
    foreach ($tabel_simultan as $row) {
        $pdf->Cell(6, 6, $t, 1, 0, 'C', FALSE);
        $pdf->Cell(35, 6, $row['nim'], 1, 0, 'C', FALSE);
          $pdf->Cell(50, 6, $row['nama'], 1, 0, 'C', FALSE);
      
        $total_nilai = $row['total_mhs'];
        $string = $row['nilai_mhs'];
        $token = strtok($string, ";");
        for ($a = 1; $a <= $total_nilai; $a++) {
            if($token >= 90){
             $pdf->Cell(35, 6, "Sangat Baik", 1, 0, 'C', FALSE);                         
            } else if($token >= 80 && $token <90 ){
             $pdf->Cell(35, 6, "Baik", 1, 0, 'C', FALSE);                                     
            } else if($token >= 70 && $token <80 ){
             $pdf->Cell(35, 6, "Cukup", 1, 0, 'C', FALSE);                                     
            } else if($token >= 60 && $token <70 ){
             $pdf->Cell(35, 6, "Kurang", 1, 0, 'C', FALSE);                                     
             } else if($token <= 60 ){
             $pdf->Cell(35, 6, "Jelek", 1, 0, 'C', FALSE);                                                 
        }  
        $token = strtok(";");
        } 
        $pdf->Ln();
       $no++;
        $t++;
    }
    $now = date("d F Y");
    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(300, 6, "Jember, $now", 0, 0, 'C');
    $pdf->Ln();
    $pdf->Cell(304, 6, "Pembantu Dekan I (Akademik)", 0, 0, 'C');
    $pdf->Ln(30);
    $pdf->SetFont('Arial', 'U', 11);
    $pdf->Cell(304, 6, " Ir. Sigit Soeparjono, M.S., Ph.D.", 0, 0, 'C');
    $pdf->Ln();
    $pdf->SetFont('Arial', '', 11);
    $pdf->Cell(304, 6, "NIP. ", 0, 0, 'C');
    $pdf->Ln();
    $pdf->Output();
?>
