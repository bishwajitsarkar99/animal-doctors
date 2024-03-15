<?php

namespace App\Http\Controllers\Forntend\Footer\Newsletter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\Newsleter;
use App\Models\Api\Newsletter;
use App\Models\Logo\Logodegin;
use App\Models\Forntend\ForntEndFooter;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Carbon\Carbon;
use PDF;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use App\Services\PdfService;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\DB;

class NewsletterController extends Controller
{
    // Index page view
    public function index(){

        // history of newsletter
        $history_newsletter_counts = Newsleter::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total')
        )
        ->groupBy('year', 'month')
        ->orderBy('year', 'asc')
        ->orderBy('month', 'asc')
        ->get();

        $subscribers = Newsleter::orderBy('id', 'desc')->get();

        $totalNumbers = Newsleter::orderBy('id')->get();
        $allnewsletter_counts_number = $totalNumbers->count();

        $startOfDay = Carbon::now()->startOfDay(); 
        $endOfDay = Carbon::now()->endOfDay();     
        $allnewsletters = Newsleter::latest()->whereBetween('created_at', [$startOfDay, $endOfDay])->get();
        return view('super-admin/forntend/footer/users-subscribe/index', compact('subscribers', 'allnewsletters', 'allnewsletter_counts_number', 'history_newsletter_counts'));
    }
    // First Table
    public function get_newsletter(Request $request){

        $startOfMonth = Carbon::now()->startOfMonth(); // Start of the current week
        $endOfMonth = Carbon::now()->endOfMonth();     // End of the current week

        $data = Newsleter::orderBy('id', 'desc')->latest()->whereBetween('created_at', [$startOfMonth, $endOfMonth]);

        if ($query = $request->get('query')) {
            $data->where('id', 'LIKE', '%' . $query . '%')
                ->orWhere('email', 'LIKE', '%' . $query . '%')
                ->orWhere('created_at', 'LIKE', '%' . $query . '%');
        }

        $perItem = 10;
        if ($request->input('per_item')) {
            $perItem = $request->input('per_item');
        }

        $data = $data->paginate($perItem)->toArray();

        return response()->json($data, 200);
    }
    public function filter_newsletter(Request $request){

        // history of newsletter
        $history_newsletter_counts = Newsleter::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total')
        )
        ->groupBy('year', 'month')
        ->orderBy('year', 'asc')
        ->orderBy('month', 'asc')
        ->get();

        $subscribers = Newsleter::orderBy('id', 'desc')->get();

        $totalNumbers = Newsleter::orderBy('id')->get();
        $allnewsletter_counts_number = $totalNumbers->count();

        // Validate the request inputs
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $start_date = date('Y-m-d', strtotime($request->input('start_date')));
        $end_date = date('Y-m-d', strtotime($request->input('end_date')));
    
        $allnewsletters = Newsleter::whereBetween('created_at', [$start_date, $end_date])->get();
    
        return view('super-admin/forntend/footer/users-subscribe/index', compact('subscribers', 'allnewsletters', 'allnewsletter_counts_number', 'history_newsletter_counts'));
    }    
    // Delete News Letter
    public function deletenewsletter($id){
        $newsletters = Newsleter::find($id);
        $newsletters->delete();

        return response()->json([
            'status'=> 200,
            'messages'=> 'The news-letter is deleted successfully',
        ]);
    }

    // PDF Download
    public function pdf_newsletter(Request $request, PdfService $pdfService){
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $companyinformations = ForntEndFooter::get();
        $companylogo = Logodegin::get();

        $start_date = date('Y-m-d', strtotime($request->input('start_date')));
        $end_date = date('Y-m-d', strtotime($request->input('end_date')));

        $allnewsletters = Newsleter::whereBetween('created_at', [$start_date, $end_date])->get();

        $html = view('pdf-download.subscriber-pdf', [
            'allnewsletters' => $allnewsletters,
            'companyinformations' => $companyinformations,
            'companylogo' => $companylogo,
        ])->render();

        $pdf = $pdfService->generatePdf($html);

        return response($pdf, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="Subscribers-Download-'. date('d-M-Y') .'.pdf"');
    }

    // Data Export to Excel Sheet
    public function export(Request $request){
        // Get the start and end dates from the request
        $start_date = date('Y-m-d', strtotime($request->input('start_date')));
        $end_date = date('Y-m-d', strtotime($request->input('end_date')));

        // Fetch newsletters based on date range
        $allnewsletters = Newsleter::query()
            ->whereBetween('created_at', [$start_date, $end_date])
            ->get();

        // Define the headers for the Excel file
        $headers = [
            'Content-Type' => 'application/vnd.ms-excel; charset=utf-8',
            'Content-Disposition' => 'attachment; filename=newsletters_export_data.xls',
        ];

        // Start building the Excel content
        $content = "\xEF\xBB\xBF"; // UTF-8 BOM
        $content .= '<html><head><meta http-equiv="content-type" content="text/html; charset=UTF-8"></head><body>';
        $content .= '<table><thead><tr><th>ID</th><th>Subcription Date</th><th>Email</th></tr></thead><tbody>';

        // Loop through newsletters and add rows to the table
        foreach ($allnewsletters as $export) {
            $content .= '<tr>';
            $content .= '<td>' . $export->id . '</td>';
            $content .= '<td>' . $export->created_at . '</td>';
            $content .= '<td>' . $export->email . '</td>';
            $content .= '</tr>';
        }

        // Close the table and HTML body
        $content .= '</tbody></table></body></html>';

        // Create the response
        $response = Response::make($content, 200, $headers);

        return $response;
    }

    // Data Export to CVS format
    public function exportCsv(Request $request){
        // Get the start and end dates from the request
        $start_date = date('Y-m-d', strtotime($request->input('start_date')));
        $end_date = date('Y-m-d', strtotime($request->input('end_date')));

        // Fetch newsletters based on date range
        $allnewsletters = Newsleter::query()
            ->whereBetween('created_at', [$start_date, $end_date])
            ->get();

        // Define the headers for the CSV file
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=Newsletters_Export_Data.CSV',
        ];

        // Start building the CSV content
        $content = "\xEF\xBB\xBF"; // UTF-8 BOM

        // Create a file handle
        $file = fopen('php://temp', 'w');

        // Write headers to the CSV
        fputcsv($file, ['ID', 'Subscription Date', 'Email']);

        // Loop through newsletters and add rows to the CSV
        foreach ($allnewsletters as $export) {
            fputcsv($file, [$export->id, $export->created_at, $export->email]);
        }

        // Place the file pointer at the beginning of the stream
        rewind($file);

        // Get the content of the file stream
        $content .= stream_get_contents($file);

        // Close the file handle
        fclose($file);

        // Create the response
        $response = Response::make($content, 200, $headers);

        return $response;
    }

    
}
