<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('assets/img/logoblanco.png' , 80 ,15, 60 , 25,'png');
    $this->Ln(10);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    $this->SetDrawColor(0,80,180);
    $this->SetFillColor(230,230,0);
    $this->SetTextColor(220,50,50);
    // Ancho del borde (1 mm)
    $this->SetLineWidth(1);
    // Movernos a la derecha
    $this->Ln(10);
    $this->Cell(90);
    $this->Cell(60,10,'Factura',0,0);
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
    $this->Cell(0,10,utf8_decode('Paginá ').$this->PageNo().'/{nb}',0,0,'C');
}

function ChapterBody($file)
{
    // Leemos el fichero
    $txt = file_get_contents($file);
    // Times 12
    $this->SetFont('Times','',12);
    // Imprimimos el texto justificado
    $this->MultiCell(0,15,$txt);
    // Salto de línea
    $this->Ln();
    // Cita en itálica
    $this->SetFont('','I');
    $this->Cell(0,5,'(fin del extracto)');
}
}
date_default_timezone_set('America/El_Salvador'); $date= date('d-m-Y') ; //$hora=date('h:i:s A');
date_default_timezone_set('America/El_Salvador'); $hoy= date('dmyhis') ;

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
    $pdf->Cell(10);
    $pdf->Cell(110,5,utf8_decode('Nombre: !False Shop Grupo FGK'),0,0);
    $pdf->Cell(30,5,utf8_decode('Fecha: '),0,0);
    $pdf->Cell(30,5,$date,1,1);
    $pdf->Cell(10);
    $pdf->Cell(110,5,utf8_decode('Telefono: (503)26353412'),0,0);
    $pdf->Cell(30,5,utf8_decode('N° Factura: '),0,0);
    $pdf->Cell(30,5,'',1,1);
    $pdf->Cell(10);
    $pdf->Cell(110,5,utf8_decode('Dirección: San Salvador, El Salvador.'),0,0);
    $pdf->Cell(30,5,utf8_decode('Id Cliente: '),0,0);
    $pdf->Cell(30,5,$this->session->user->id,1,1);
    $pdf->Ln(15);
    

    $pdf->Cell(10);
    $pdf->Cell(170,5,utf8_decode('Factura a nombre de:'),1,1);
    $pdf->Ln(5);
    $pdf->Cell(10);
    $pdf->Cell(110,5,utf8_decode('Nombre: '.$this->session->user->nombre),0,1);
    
    $pdf->Cell(10);
    $pdf->Cell(110,5,utf8_decode('Telefonó: '.$this->session->user->telefono),0,1);
    
    $pdf->Cell(10);
    $pdf->Cell(110,5,utf8_decode('Dirección: '.$this->session->user->direccion),0,1);
    $pdf->Ln(10);
    $pdf->Cell(10);
    $pdf->Cell(170,5,'Detalle de compra: ',1,1);
    
    //$pdf->Cell(90);
    //$pdf->Cell(0,0,'Hora: '.$hora,0,0);
   
    $pdf->Ln(10);
    $pdf->Cell(10);
    $pdf->Cell(50,5,utf8_decode('Producto'),1,0);
    $pdf->Cell(35,5,utf8_decode('Precio'),1,0);
    $pdf->Cell(35,5,utf8_decode('Cantidad'),1,0);
    $pdf->Cell(50,5,utf8_decode('Subtotal'),1,1);
   
    if ($this->session->carrito) {
        $total = 0;
        foreach ($this->session->carrito as $llave => $producto) {
            $pdf->Cell(10);
            $pdf->Cell(50,5,utf8_decode($producto->nombre),1,0);
            $pdf->Cell(35,5, utf8_decode('$ '.$producto->precio),1,0);
            $pdf->Cell(35,5,utf8_decode($producto->fcantidad),1,0);
            $pdf->Cell(50,5,utf8_decode('$ '.$producto->subtotal),1,1);
            $total += $producto->subtotal;
        }
    }

        $pdf->Ln(5);
        $pdf->Cell(95);
        $pdf->SetTextColor(220,50,50);
        $pdf->Cell(35,5,utf8_decode('Total'),1,0);
        $pdf->Cell(50,5,utf8_decode('$ '.$total),1,1);
    
        $pdf->Ln(30);
        $pdf->Cell(73);
        $pdf->SetTextColor(9,8,8);
        $pdf->Cell(30,0,utf8_decode('¡¡Gracias por su compra!!'),0,1);
        $pdf->Ln(5);
        $pdf->Cell(85);
        $pdf->Cell(30,0,utf8_decode('Contactanos'),0,1);
        $pdf->Ln(5);
        $pdf->Cell(75);
        $pdf->Cell(30,0,utf8_decode('infocdsfgk@gmail.com'),0,1);

        $pdf->Output('F','assets/files/false'.$hoy.'.pdf');
       
?>
