<?php
    session_start();
    if(!isset($_SESSION['id_user'])){
        header('location: login.php');
    }

    require_once '../libraries/tcpdf/tcpdf.php';
    class Pdf extends TCPDF
    { function __construct() { parent::__construct(); }}

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
    


    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // set document information
    $pdf->SetTitle('Vivid Vision Outline');

    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

    // Add a page
    // This method has several options, check the source code documentation for more information.
    $pdf->AddPage();

    // set text shadow effect
    // $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

    $content = '
    <h2 align="center"><u>'.$row['company'].' Vivid Vision</u></h2>

    <table>
        <tr>
            <th width="85px">Status:</th>
            <th width="120px"><b>'.$row['status'].'</b></th>
        </tr>
        <tr>
            <th width="85px">Owner:</th>
            <th width="120px"><b>'.$row['owner'].'</b></th>
        </tr>
         <tr>
            <th width="85px">Last Updated:</th>
            <th width="120px"><b>'.date("F j, Y",strtotime($row['last_update'])).'</b></th>
        </tr>
    </table>

    <h2  align="center"><u>Your Vivid Vision</u></h2>

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
    Our BHAG (Big Hairy Audacious Goal) is <b>'.$row['mission'].'</b>

    <br>

    <h4>WHAT WE DO</h4>
    '.$row['wwd'].'
    ';
    // set some text to print
    // $html = <<<EOD
    //     $content
    // EOD;

    // Print text using writeHTMLCell()
    // $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
    $pdf->writeHTMLCell(0, 0, '', '', $content, 0, 1, 0, true, '', true);

    // ---------------------------------------------------------

    // Close and output PDF document
    // This method has several options, check the source code documentation for more information.
    $pdf->Output('example_001.pdf', 'I');

    //============================================================+
    // END OF FILE
    //============================================================+
    

?>