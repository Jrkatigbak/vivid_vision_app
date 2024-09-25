<?php
    require_once '../libraries/tcpdf/tcpdf.php';
    class Pdf extends TCPDF
    { function __construct() { parent::__construct(); }}

    $status = '<div style="color:#fff;background-color:#6861CE">PENDING</div> ';



    $name = 'John Rey';
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
    <h2  align="center"><u>Vivid Vision</u></h2>

    Status: <br>
    Owner: <br>
    Last Updated: <br>

    <h2  align="center"><u>Your Vivid Vision</u></h2>
    <p>Vivid Vision Overview: The following is our Vivid Vision. Creating this vision brings the future into the present, so we have clarity on what we are creating right now and can always take the most strategic and direct steps to make it a reality. This is a detailed overview of what our business will look like, feel like, and act like 3 years from now by {DATE}.</p>

    <p>Its December 31st, {YEAR}. Were ending the single best year of our company history, and the company is riding a major high. We have just…</p>

    <ul>
        <li>{Accomplishment 1}  ← {Long Text Box}</li>
        <li>{Accomplishment 2}  ← {Long Text Box}</li>
        <li>{Accomplishment 3}  ← {Long Text Box}</li>
    </ul>
    <br>

    <h4>WHO WE ARE</h4>
    <p>At {COMPANY}, we are a  {Text Box}______________ company for {Text Box} ___________. We work with ← {Text Box}________________.</p>
    <br>

    <h4>OUR MISSION</h4>
    Our BHAG (Big Hairy Audacious Goal) is {Explain your goal/mission}

    <p>{Paragraph Text Box}</p>
    <br>

    <h4>WHAT WE DO</h4>
    {Explain your core products / pillars}
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