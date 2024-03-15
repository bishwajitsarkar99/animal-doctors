<?php

namespace App\Services;

use Dompdf\Dompdf;
use Dompdf\Options;

class PdfService
{
    public function generatePdf($html)
    {
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);

        // (Optional) Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        // Get the total number of pages
        $totalPages = $dompdf->get_canvas()->get_page_count();

        // Loop through each page to add page numbers
        for ($pageNumber = 1; $pageNumber <= $totalPages; $pageNumber++) {
            $dompdf->getCanvas()->page_text(10, 10, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
        }

        // Output the PDF
        return $dompdf->output();
        
    }
}
