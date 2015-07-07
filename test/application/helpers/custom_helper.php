<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*

  /**
 * Description of PdfSetting
 *
 * @author Rohmad Raharjo
 */

if (!function_exists('setpdf_info')) {

    function setpdf_info($pdf, $author = 'Rohmad Raharjo', $title = 'Default Pdf Document', $subject = '', $keywords = '') {
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor($author);
        $pdf->SetTitle($title);
        $pdf->SetSubject($subject);
        $pdf->SetKeywords($keywords);

        return $pdf;
    }

    if (!function_exists('setpdf_headers_default')) {

        function setpdf_headers_default($pdf) {
            // remove default header/footer
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);

            // set default monospaced font
            $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

            // set margins
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

            // set auto page breaks
            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            // set image scale factor
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

            // set some language-dependent strings (optional)
            if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
                require_once(dirname(__FILE__) . '/lang/eng.php');
                $pdf->setLanguageArray($l);
            }
            // set font
            $pdf->SetFont('times', 'BI', 20);


            return $pdf;
        }

    }
    if (!function_exists('setbarcode1d_default_style')) {

        function setbarcode_default_style() {
            $style = array(
                'position' => '',
                'align' => 'C',
                'stretch' => false,
                'fitwidth' => true,
                'cellfitalign' => '',
                'border' => true,
                'hpadding' => 'auto',
                'vpadding' => 'auto',
                'fgcolor' => array(0, 0, 0),
                'bgcolor' => false, //array(255,255,255),
                'text' => true,
                'font' => 'helvetica',
                'fontsize' => 8,
                'stretchtext' => 4
            );
            
            return $style;
        }

    }
}
