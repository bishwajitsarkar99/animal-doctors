<?php

namespace App\Http\Controllers\Forntend\Footer\Newsletter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PdfService;
use App\LogicBild\Forntend\Footer\FooterServiceProvider;

class NewsletterController extends Controller
{
    protected $footerServiceProvider;

    // inject FooterServiceProvider
    public function __construct(FooterServiceProvider $footerServiceProvider)
    {
        return $this->footerServiceProvider = $footerServiceProvider;
    }

    // Index page view
    public function index()
    {
        return $this->footerServiceProvider->viewNewsLetter();   
    }

    // First Table
    public function get_newsletter(Request $request)
    {
        return $this->footerServiceProvider->getNewsLetters($request);  
    }

    // Filter News Letter
    public function filter_newsletter(Request $request)
    {
        return $this->footerServiceProvider->filterNewsLetters($request); 
    }    

    // Delete News Letter
    public function deletenewsletter($id)
    {
        return $this->footerServiceProvider->deleteNewsLetters($id); 
    }

    // PDF Download
    public function pdf_newsletter(Request $request, PdfService $pdfService)
    {
        return $this->footerServiceProvider->pdfNewsLetters($request, $pdfService); 
    }

    // Data Export to Excel Sheet
    public function export(Request $request)
    {
        return $this->footerServiceProvider->exportExcel($request); 
    }

    // Data Export to CVS format
    public function exportCsv(Request $request)
    {
        return $this->footerServiceProvider->dataExportCsv($request); 
    }

    
}
