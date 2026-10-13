<?php
session_start();

    $usuario = $_SESSION['usr'];
    $id = $_SESSION['id'];
    $perfil = $_SESSION['perfil'];
    $nombre = $_SESSION['nombre'];

require('pdf/fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    // $pdf->MultiCell(0,9, $pdf->Image("../img/logos_pej2022.png", $pdf->GetX()+5, $pdf->GetY()+3, 180) ,0,"C");

    $this->Image('../../img/logo_transformando_3.png',77,7,70);
    // Arial bold 15
    $this->SetFont('Helvetica', 'B', 15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    // $this->Cell(30,10,utf8_decode('Constancia de participación'),0,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    // $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Image('../../img/fondo2_starlikes.png','0','0','250','300','PNG');
// $pdf->MultiCell(190,9, $pdf->Image("../img/logos_pej2022.png", $pdf->GetX()+5, $pdf->GetY()+3, 180) ,0,"C");
$pdf->Ln();
$pdf->SetFont('Courier','B',18);
$pdf->Multicell(190,8,utf8_decode('



CONSTANCIA DE PARTICIPACIÓN


'),0,'C',0);

$pdf->SetFont('Courier','B',9);
$pdf->Cell(0,12,utf8_decode('Estimado(a) participante, '.$nombre.' '),0,1);
$pdf->SetFont('Courier','',8);
$pdf->Multicell(190,9,utf8_decode('Por medio de la presente, el Instituto de la Juventud del Estado de Zacatecas, a través de su Director General, el Ing. Mauricio Acevedo Rodríguez, reconoce a usted su participación como candidato(a) en la plataforma Transformando Espacios por el Progreso.

Su postulación es fundamental para la construcción de un Estado más próspero, incluyente, democrático e igualitario. Gracias a su intervención, recordamos lo importante que es reconocer el talento y la trayectoria de las y los jóvenes en nuestra entidad. Los principios rectores de la Nueva Gobernanza, nos obligan a impulsar y generar los espacios oportunos para que las juventudes puedan alcanzar sus objetivos, desarrollarse de manera integral y vivir en bienestar. No sólo representas uno de los cimientos más importantes de la sociedad, también eres protagonista del presente y agente estratégico para la transformación nacional.
'),0,'J',0);
$pdf->SetFont('Times','I',9);
$pdf->Multicell(190,9,'


En la ciudad de Zacatecas, Zac., noviembre de 2026.

',0,'C',0);
$pdf->MultiCell(190,9, $pdf->Image("../../img/rubrica_pej2022.png", $pdf->GetX()+20, $pdf->GetY()-10, 150) ,0,"C",0);
//IMAGE (RUTA,X,Y,ANCHO,ALTO,EXTEN)
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Times','B',8);
$pdf->Multicell(190,8,'DIRECTOR GENERAL
INSTITUTO DE LA JUVENTUD DEL ESTADO DE ZACATECAS',0,'C',0);

// $pdf->Output();
$modo="I";
$nombre_archivo="constancia_transformando_espacios_".$usuario.".pdf";
$pdf->Output($nombre_archivo,$modo);  

?>
