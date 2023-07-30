<?php
if(!isset($_POST['id']))
{
  die("Direct access not allowed");
}
  include('tcpdf/php-barcode.php');
  require('tcpdf/fpdf.php');
   // -------------------------------------------------- //
  //                      USEFUL
  // -------------------------------------------------- //
  
  class eFPDF extends FPDF{
    function TextWithRotation($x, $y, $txt, $txt_angle, $font_angle=0)
    {
        $font_angle+=90+$txt_angle;
        $txt_angle*=M_PI/180;
        $font_angle*=M_PI/180;
    
        $txt_dx=cos($txt_angle);
        $txt_dy=sin($txt_angle);
        $font_dx=cos($font_angle);
        $font_dy=sin($font_angle);
    
        $s=sprintf('BT %.2F %.2F %.2F %.2F %.2F %.2F Tm (%s) Tj ET',$txt_dx,$txt_dy,$font_dx,$font_dy,$x*$this->k,($this->h-$y)*$this->k,$this->_escape($txt));
        if ($this->ColorFlag)
            $s='q '.$this->TextColor.' '.$s.' Q';
        $this->_out($s);
    }
  }
/*sun sako to suno wo jo aine kaha
sach kaho to kahneko ab kuch rha nhi*/
  // -------------------------------------------------- //
  //                  PROPERTIES
  // -------------------------------------------------- //
  
  $fontSize = 8;
  $marge    = 8;   // between barcode and hri in pixel
  $x        = 0;  // barcode center
  $y        = 40;  // barcode center
  $height   = 25;   // barcode height in 1D ; module size in 2D
  $width    = 1;    // barcode height in 1D ; not use in 2D
  $angle    = 0;   // rotation in degrees
  
  $code     = $_POST['id']; // barcode, of course ;)
  $type     = 'code128';
  $black    = '000000'; // color in hexa
  $W    = 'ffffff'; // color in hexa
  
  
  // -------------------------------------------------- //
  //            ALLOCATE FPDF RESSOURCE
  // -------------------------------------------------- //
    
  $pdf = new eFPDF('P', 'pt',array(592.44,844.72));
  
  $pdf->AddPage();
  $pdf->SetFont('Arial','B',$fontSize);
//  $pdf->SetTextColor(255, 255, 255);
  $pdf->SetTextColor(0, 0, 0);
  
  // -------------------------------------------------- //
  //                      BARCODE
  // -------------------------------------------------- //
  
  $data = Barcode::fpdf($pdf, $W, $x+'60', $y, $angle, $type, $code, $width, $height);
  $len = $pdf->GetStringWidth($data['hri']);

  $data = Barcode::fpdf($pdf, $black, $x+'60', $y, $angle, $type,$code, $width, $height);

  Barcode::rotate(-$len / 2, ($data['height'] / 2) + $fontSize + $marge, $angle, $xt, $yt);
  $pdf->TextWithRotation($x+'40', $y-'5' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'180', $y, $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'155', $y-'5' + $yt, $data['hri'], $angle);
  
  $data = Barcode::fpdf($pdf, $black, $x+'295', $y, $angle, $type,$code, $width, $height);
  $pdf->TextWithRotation($x +'280', $y-'5' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'410', $y, $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'395', $y-'5' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'525', $y, $angle, $type,$code, $width, $height);
  $pdf->TextWithRotation($x +'515', $y-'5' + $yt, $data['hri'], $angle);


//  -------------------------------------------    2nd row     --------------------------------------------------------//
  $data = Barcode::fpdf($pdf, $black, $x+'60', $y+'65', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'40', $y+'60' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'180', $y+'65', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'155', $y+'60' + $yt, $data['hri'], $angle);
  
  $data = Barcode::fpdf($pdf, $black, $x+'295', $y+'65', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'280', $y+'60' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'410', $y+'65', $angle, $type,$code, $width, $height);
  $pdf->TextWithRotation($x +'395', $y+'60' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'525', $y+'65', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'515', $y+'60' + $yt, $data['hri'], $angle);

//  -------------------------------------------    3rd row    --------------------------------------------------------//
  $data = Barcode::fpdf($pdf, $black, $x+'60', $y+'130', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'40', $y+'125' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'180', $y+'130', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'155', $y+'125' + $yt, $data['hri'], $angle);
  
  $data = Barcode::fpdf($pdf, $black, $x+'295', $y+'130', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'280', $y+'125' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'410', $y+'130', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'395', $y+'125' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'525', $y+'130', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'515', $y+'125' + $yt, $data['hri'], $angle);
  
  $pdf->SetTextColor(0, 0, 0);
  $black='000000';
//  -------------------------------------------    4th row    --------------------------------------------------------//
  $data = Barcode::fpdf($pdf, $black, $x+'60', $y+'190', $angle, $type,$code, $width, $height);
  $pdf->TextWithRotation($x +'40', $y+'185' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'180', $y+'190', $angle, $type,$code, $width, $height);
  $pdf->TextWithRotation($x +'155', $y+'185' + $yt, $data['hri'], $angle);
  
  $data = Barcode::fpdf($pdf, $black, $x+'295', $y+'190', $angle, $type,$code, $width, $height);
  $pdf->TextWithRotation($x +'280', $y+'185' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'410', $y+'190', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'395', $y+'185' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'525', $y+'190', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'515', $y+'185' + $yt, $data['hri'], $angle);
  
//  -------------------------------------------    5th row    --------------------------------------------------------//
  $data = Barcode::fpdf($pdf, $black, $x+'60', $y+'250', $angle, $type,$code, $width, $height);
  $pdf->TextWithRotation($x +'40', $y+'245' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'180', $y+'250', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'155', $y+'245' + $yt, $data['hri'], $angle);
  
  $data = Barcode::fpdf($pdf, $black, $x+'295', $y+'250', $angle, $type,$code, $width, $height);
  $pdf->TextWithRotation($x +'280', $y+'245' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'410', $y+'250', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'395', $y+'245' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'525', $y+'250', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'515', $y+'245' + $yt, $data['hri'], $angle);
  
//  -------------------------------------------    6th row    --------------------------------------------------------//
  $data = Barcode::fpdf($pdf, $black, $x+'60', $y+'320', $angle, $type,$code, $width, $height);
  $pdf->TextWithRotation($x +'40', $y+'315' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'180', $y+'320', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'155', $y+'315' + $yt, $data['hri'], $angle);
  
  $data = Barcode::fpdf($pdf, $black, $x+'295', $y+'320', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'280', $y+'315' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'410', $y+'320', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'395', $y+'315' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'525', $y+'320', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'515', $y+'315' + $yt, $data['hri'], $angle);
  
//  -------------------------------------------    7th row    --------------------------------------------------------//
  $data = Barcode::fpdf($pdf, $black, $x+'60', $y+'380', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'40', $y+'375' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'180', $y+'380', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'155', $y+'375' + $yt, $data['hri'], $angle);
  
  $data = Barcode::fpdf($pdf, $black, $x+'295', $y+'380', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'280', $y+'375' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'410', $y+'380', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'395', $y+'375' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'525', $y+'380', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'515', $y+'375' + $yt, $data['hri'], $angle);
  
//  -------------------------------------------    8th row    --------------------------------------------------------//
  $data = Barcode::fpdf($pdf, $black, $x+'60', $y+'445', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'40', $y+'440' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'180', $y+'445', $angle, $type,$code, $width, $height);
  $pdf->TextWithRotation($x +'155', $y+'440' + $yt, $data['hri'], $angle);
  
  $data = Barcode::fpdf($pdf, $black, $x+'295', $y+'445', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'280', $y+'440' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'410', $y+'445', $angle, $type,$code, $width, $height);
  $pdf->TextWithRotation($x +'395', $y+'440' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'525', $y+'445', $angle, $type,$code, $width, $height);
  $pdf->TextWithRotation($x +'515', $y+'440' + $yt, $data['hri'], $angle);
  
//  -------------------------------------------    9th row    --------------------------------------------------------//
  $data = Barcode::fpdf($pdf, $black, $x+'60', $y+'505', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'40', $y+'500' + $yt, $data['hri'], $angle);
  
  $data = Barcode::fpdf($pdf, $black, $x+'180', $y+'505', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'155', $y+'500' + $yt, $data['hri'], $angle);
  
  $data = Barcode::fpdf($pdf, $black, $x+'295', $y+'505', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'280', $y+'500' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'410', $y+'505', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'395', $y+'500' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'525', $y+'505', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'515', $y+'500' + $yt, $data['hri'], $angle);
  
//  -------------------------------------------    10th row    --------------------------------------------------------//
  $data = Barcode::fpdf($pdf, $black, $x+'60', $y+'560', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'40', $y+'555' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'180', $y+'560', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'155', $y+'555' + $yt, $data['hri'], $angle);
  
  $data = Barcode::fpdf($pdf, $black, $x+'295', $y+'560', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'280', $y+'555' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'410', $y+'560', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'395', $y+'555' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'525', $y+'560', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'515', $y+'555' + $yt, $data['hri'], $angle);
  
//  -------------------------------------------    11th row    --------------------------------------------------------//
  $data = Barcode::fpdf($pdf, $black, $x+'60', $y+'620', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'40', $y+'615' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'180', $y+'620', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'155', $y+'615' + $yt, $data['hri'], $angle);
  
  $data = Barcode::fpdf($pdf, $black, $x+'295', $y+'620', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'280', $y+'615' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'410', $y+'620', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'395', $y+'615' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'525', $y+'620', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'515', $y+'615' + $yt, $data['hri'], $angle);
  
//  -------------------------------------------    12th row    --------------------------------------------------------//
  $data = Barcode::fpdf($pdf, $black, $x+'60', $y+'690', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'40', $y+'685' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'180', $y+'690', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'155', $y+'685' + $yt, $data['hri'], $angle);
  
  $data = Barcode::fpdf($pdf, $black, $x+'295', $y+'690', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'280', $y+'685' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'410', $y+'690', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'395', $y+'685' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'525', $y+'690', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'515', $y+'685' + $yt, $data['hri'], $angle);
  
//  -------------------------------------------    13th row    --------------------------------------------------------//
  $data = Barcode::fpdf($pdf, $black, $x+'60', $y+'750', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'40', $y+'745' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'180', $y+'750', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'155', $y+'745' + $yt, $data['hri'], $angle);
  
  $data = Barcode::fpdf($pdf, $black, $x+'295', $y+'750', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'280', $y+'745' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'410', $y+'750', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'395', $y+'745' + $yt, $data['hri'], $angle);

  $data = Barcode::fpdf($pdf, $black, $x+'525', $y+'750', $angle, $type, $code, $width, $height);
  $pdf->TextWithRotation($x +'515', $y+'745' + $yt, $data['hri'], $angle);
  
//  $pdf->Output();
  $pdf->Output('product_id_'.$code.'_barcode.pdf','D');
//header( "Location: ".url("generate-barcode.php")) ;

?>