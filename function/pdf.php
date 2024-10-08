<?php
// Include FPDF library
require_once('../libraries/tcpdf/tcpdf.php');
include '../Class/Db.php'; 
include '../Class/Vivid_vision.php';  

$database = new Db();
$db = $database->connect();
$vivid_vision = new Vivid_vision($db);


$id = $_GET['id'];
$row = $vivid_vision->get($id);
if(!isset($row['status']) || $id == ''){ 
    header('location: ../index.php'); 
} 



class PDF extends TCPDF {


    // Custom Header function
    function Header() {
        // Insert a logo or image as the header (Image function)
        $logo = 'default_pic.png';
        if(isset($row['logo'])){
            $logo = $row['logo'];
        }
        $this->Image('../assets/img/upload/logo/'.$logo, 90, 6, 30); // (file, x, y, width)

        // Set font for header
        $this->SetFont('', 'B', 12);

        // Move to the right
        $this->Cell(80);

        // Title
        // $this->Cell(30, 10, 'Title of PDF', 0, 1, 'C');

        // Line break after header
        $this->Ln(20);
    }

    // Custom Footer function
    function Footer() {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);

        // Set font
        $this->SetFont('', 'I', 8);

        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}

// Create PDF instance
$pdf = new PDF();

// Set font for the content
$pdf->SetFont('', '', 12);

$pdf->SetTopMargin(44);  // Adjust the top margin as needed (30mm in this example)

// Sample text content
// $pdf->Cell(0, 70, '<h2  align="center">Vivid Vision Overview</h2>', 0, 1);

// $pdf->AddPage();

// $pdf->Cell(0, 70, 'This is sample content below the header image.', 0, 1);

$pdf->AddPage();

$html = '
    <h2  align="center">Vivid Vision Overview</h2>

    <p>'.$row['vivid_mission'].' <span><b><i>'.date("F j, Y",strtotime($row['date_vivid_mission'])).'</i></b></span> </p>

    <p>Its December 31st, <b>'.$row['date_accomp'].'</b>. Were ending the single best year of our company history, and the company is riding a major high. We have just…</p>

    <ul>
        <li>'.$row['accom1'].'</li>
        <li>'.$row['accom2'].'</li>
        <li>'.$row['accom3'].'</li>
    </ul>
    <br>

    <h4>WHO WE ARE</h4>
    <p>At <b>'.$row['wwa1'].'</b>, we are a  <b>'.$row['wwa2'].'</b> company for <b>'.$row['wwa3'].'</b>. We work with <b>'.$row['wwa4'].'</b>.</p>
    <br>

    <h4>OUR MISSION</h4>
    <p>Our BHAG (Big Hairy Audacious Goal) is <b>'.$row['mission'].'</b></p>

    <br>

    <h4>WHAT WE DO</h4>
    '.$row['wwd'].'
';

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->AddPage();

$html = '
   <p>Our bread and butter is <b>'.$row['vv21'].'</b>.  
    This is our <b>'.$row['vv22'].'</b> program designed for <b>'.$row['vv23'].'</b>. 
    We are #1 in the world for what we do in this program because <b>'.$row['vv24'].'</b> 
    </p>

    <br>

    <h4>THE DETAILS</h4>
    <p>We are based in  <b>'.$row['vv25'].'</b> 
    and have a team all throughout the world. At our headquarters - a modern, clean, open office in  
    <b>'.$row['vv26'].'</b> - we have over  
    <b>'.$row['vv27'].'</b> of our team including most of the core Leadership team. We also have satellite locations outside of the  
    <b>'.$row['vv28'].'</b>, with our growing global footprint and business opportunities. 
    </p>


    <p>We do what we do to transform the world for the better, 
    <b>'.$row['vv29'].'</b> and a lot more growth to be able to make a bigger impact. 
    </p>

    <p>This ripple effect of the companies that we work with reaches 
    <b>'.$row['vv210'].'</b> all throughout the world. 
    </p>

    <br>

    <h4>OUR CORE VALUES</h4>
    <p>We live by our Core Value of 
    <b>'.$row['vv211'].'</b> and attract a world-class type of person to our brand and programs. We protect who we work with and serve at the highest level, and are proud of this impact that the ripple effect is making across the globe.
    </p>

    <p>We are looked upon as an elite, world-class team and company. We have started winning various awards for our team, our culture, and are known as an elite place to work. We have grown exponentially fast and within 
     <b>'.$row['vv212'].'</b> years of operations and have a healthy mix of 
     <b>'.$row['vv213'].'</b> setting us up for an even more incredible future.
    </p>

    <p>Why do we have such a high success rate? Largely in part to our team, but also to our culture; one that is driven by 
        <b>'.$row['vv214'].'</b>, 
        <b>'.$row['vv215'].'</b>, 
        and 
        <b>'.$row['vv216'].'</b>. 
        We are the best in the world at 
        <b>'.$row['vv217'].'</b>, and these Core Values help us drive consistent, repeatable, and scalable results.
    </p>
';

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->AddPage();

$html = '

<p>Our company is now doing  $<b>'.number_format($row['vv31'],2).'</b> per month in revenue, and were set to chase some even more massive growth within 
<b>'.$row['vv32'].'</b> in the coming year ahead.</p>

<p>We are on a mission to  <b>'.$row['vv33'].'</b> and are well on our way!</p>

<br>
<h4>The Core Values we live and breathe every day:</h4>
<ul>
    <li><b>'.$row['vv34'].'</b><li>
    <li><b>'.$row['vv35'].'</b><li>
    <li><b>'.$row['vv36'].'</b><li>
    <li><b>'.$row['vv37'].'</b><li>
</ul>

<br>
<h4>OUR ELITE TEAM</h4>
<p>Our team is <b>'.$row['vv38'].'</b> We move fast, are bold, have crazy high standards, are hungry and addicted to growth and learning, and enjoy what we do. We thrive on growth, learning, and love the opportunity to serve this mission together.</p>
';

$pdf->writeHTML($html, true, false, true, false, '');


// Output the PDF to browser
$pdf->Output();
?>