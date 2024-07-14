<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Medicine\Inventory;
use App\Models\MedicineGroup;
use App\Models\MedicineDogs;
use App\Models\MedicineOrigin;
use App\Models\MedicineName;
use App\Models\Role;
use App\Models\User;
use App\Models\Supplier\Supplier;
use App\Models\Logo\Logodegin;
use App\Models\Forntend\ForntEndFooter;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use App\Services\LandScapPdfService;
use Symfony\Component\Console\Input\Input;
use PDF;
use Illuminate\Support\Facades\Response;

class InventoryDetailsRecord extends Controller
{
    public function index(Request $request)
    {
        $suppliers = Supplier::where('supplier_status', 1)->orderBy('id', 'desc')->get();
        $roles = Role::whereIn('id', [2, 3, 4, 5])->get(); 
        $medicine_groups = MedicineGroup::where('status', 1)->orderBy('id', 'desc')->get();
        $medicine_dosages = MedicineDogs::with('medicine_names')->where('status', 1)->orderBy('id', 'desc')->get();
        $medicine_origins = MedicineOrigin::where('status', 1)->orderBy('id', 'desc')->get();
        $medicine_names = MedicineName::where('status', 1)->orderBy('id', 'desc')->get();

        if ($request->expectsJson()) {

            return response()->json([
                'suppliers' => $suppliers,
                'roles' => $roles,
                'medicine_groups' => $medicine_groups,
                'medicine_dosages' => $medicine_dosages,
                'medicine_origins' => $medicine_origins,
                'medicine_names' => $medicine_names,
            ]);
        }
        return view('super-admin.inventory-details.index');
    }
    
    // Inventory Details Record View
    public function getInventoryDetailsRecord(Request $request)
    {
        if (!$request->ajax()) {
            return abort(404);
        }

        $user_id = $request->input('user_id');
        $supplier_id = $request->input('supplier_id');
        $inv_id = $request->input('inv_id');
        $status = $request->input('status');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $medicine_group = $request->input('medicine_group');
        $medicine_dosage = $request->input('medicine_dosage');
        $medicine_origin = $request->input('medicine_origin');
        $medicine_name = $request->input('medicine_name');
    
        // Initialize month and year arrays
        $months = [];
        $years = [];
    
        if ($start_date && $end_date) {
            $start = Carbon::parse($start_date)->startOfMonth();
            $end = Carbon::parse($end_date)->endOfMonth();
    
            while ($start->lte($end)) {
                $months[] = $start->format('F Y');
                $start->addMonth();
            }
            $years = array_unique(array_map(function($month) {
                return Carbon::parse($month)->format('Y');
            }, $months));
        }
    
        $query = Inventory::with([
            'medicine_names', 'medicine_groups', 'units',
            'users', 'roles', 'suppliers', 'sub_categories', 
            'medicine_origins', 'medicine_dogs'
        ])->orderBy('inventory_id', 'desc');

        // Apply date filter
        if ($start_date && $end_date) {
            $query->whereBetween('created_at', [
                Carbon::parse($start_date), 
                Carbon::parse($end_date)->endOfDay()
            ]);
        }

        // Apply additional filters
        if ($user_id) {
            $query->where('user_id', 'LIKE', '%' . $user_id . '%');
        }
        
        if ($supplier_id) {
            $query->where('supplier_id', 'LIKE', '%' . $supplier_id . '%');
        }
        if ($inv_id) {
            $query->where('inv_id', $inv_id);
        }
    
        if ($medicine_group) {
            $query->where('medicine_group', 'LIKE', '%' . $medicine_group . '%');
        }
        if ($medicine_dosage) {
            $query->where('medicine_dosage', $medicine_dosage);
        }
        if ($medicine_origin) {
            $query->where('medicine_origin', 'LIKE', '%' . $medicine_origin . '%');
        }
        if ($medicine_name) {
            $query->where('medicine_name', 'LIKE', '%' . $medicine_name . '%');
        }
    
        if ($status !== null) {
            if ($status === 'null') {
                $query->whereNull('status');
            } else {
                $query->where('status', $status);
            }
        }

        // Clone the query for calculating totals
        $totalPendingQuery = clone $query;
        $totalInvPending = $totalPendingQuery->whereNull('status')->sum('sub_total');
    
        $totalDenyQuery = clone $query;
        $totalInvDeny = $totalDenyQuery->where('status', '0')->sum('sub_total');
    
        $totalJustifyQuery = clone $query;
        $totalInvJustify = $totalJustifyQuery->where('status', '1')->sum('sub_total');
    
        $totalQuantityQuery = clone $query;
        $totalInvQty = $totalQuantityQuery->sum('quantity');
    
        $totalInv = $query->sum('sub_total');
        
        $perItem = $request->input('per_item', 10);
        $data = $query->paginate($perItem)->toArray();
        return response()->json([
            'data' => $data['data'],
            'links' => $data['links'],
            'total' => $data['total'],
            'totalInv' => $totalInv,
            'totalInvQty' => $totalInvQty,
            'totalInvPending' => $totalInvPending,
            'totalInvDeny' => $totalInvDeny,
            'totalInvJustify' => $totalInvJustify,
            'months' => $months,
            'years' => array_values($years)

        ], 200);
    }

    // PDF Download
    public function pdf_inventory(Request $request, LandScapPdfService $landscappdfService)
    {
        $user_id = $request->input('user_id');
        $supplier_id = $request->input('supplier_id');
        $inv_id = $request->input('inv_id');
        $status = $request->input('status');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $medicine_group = $request->input('medicine_group');
        $medicine_dosage = $request->input('medicine_dosage');
        $medicine_origin = $request->input('medicine_origin');
        $medicine_name = $request->input('medicine_name');

        // Initialize month and year arrays
        $months = [];
        $years = [];
    
        if ($start_date && $end_date) {
            $start = Carbon::parse($start_date)->startOfMonth();
            $end = Carbon::parse($end_date)->endOfMonth();
    
            while ($start->lte($end)) {
                $months[] = $start->format('F Y');
                $start->addMonth();
            }
            $years = array_unique(array_map(function($month) {
                return Carbon::parse($month)->format('Y');
            }, $months));
        }

        // Fetch inventory based on date range
        $query = Inventory::with([
            'medicine_names', 'medicine_groups', 'units',
            'users', 'roles', 'suppliers', 'sub_categories', 
            'medicine_origins', 'medicine_dogs'
        ])->orderBy('inventory_id', 'asc');

        // Apply date filter
        if ($start_date && $end_date) {
            $query->whereBetween('created_at', [
                Carbon::parse($start_date), 
                Carbon::parse($end_date)->endOfDay()
            ]);
        }

        // Apply additional filters
        if ($user_id) {
            $query->where('user_id', 'LIKE', '%' . $user_id . '%');
        }
        
        if ($supplier_id) {
            $query->where('supplier_id', 'LIKE', '%' . $supplier_id . '%');
        }
        if ($inv_id) {
            $query->where('inv_id', $inv_id);
        }
    
        if ($medicine_group) {
            $query->where('medicine_group', 'LIKE', '%' . $medicine_group . '%');
        }
        if ($medicine_dosage) {
            $query->where('medicine_dosage', $medicine_dosage);
        }
        if ($medicine_origin) {
            $query->where('medicine_origin', 'LIKE', '%' . $medicine_origin . '%');
        }
        if ($medicine_name) {
            $query->where('medicine_name', 'LIKE', '%' . $medicine_name . '%');
        }
    
        if ($status !== null) {
            if ($status === 'null') {
                $query->whereNull('status');
            } else {
                $query->where('status', $status);
            }
        }


        // Clone the query for calculating totals
        $totalVatQuery = clone $query;
        $totalInvVat = $totalVatQuery->sum('vat_percentage');
    
        $totalTaxQuery = clone $query;
        $totalInvTax = $totalTaxQuery->sum('tax_percentage');
    
        $totalDiscountQuery = clone $query;
        $totalInvDiscount = $totalDiscountQuery->sum('discount_percentage');
    
        $totalQuantityQuery = clone $query;
        $totalInvQty = $totalQuantityQuery->sum('quantity');
        
        $totalAmount = $query->sum('amount');
        $totalInv = $query->sum('sub_total');

        // Table Top header
        $totalPendingQuery = clone $query;
        $totalInvPending = $totalPendingQuery->whereNull('status')->sum('sub_total');
    
        $totalDenyQuery = clone $query;
        $totalInvDeny = $totalDenyQuery->where('status', '0')->sum('sub_total');
    
        $totalJustifyQuery = clone $query;
        $totalInvJustify = $totalJustifyQuery->where('status', '1')->sum('sub_total');

        $netTotal = $totalInvPending + $totalInvDeny + $totalInvJustify;

        $inventories = $query->get();
        $companyinformations = ForntEndFooter::get();
        $companylogo = Logodegin::get();
        // Convert image to base64
        $imagePath = public_path('image/log/comp-logo.png');
        $imageData = base64_encode(file_get_contents($imagePath)); 

        $html = view('pdf-download.inventory-pdf', [
            'inventories' => $inventories,
            'totalInv' => $totalInv,
            'totalInvQty' => $totalInvQty,
            'totalAmount' => $totalAmount,
            'totalInvVat' => $totalInvVat,
            'totalInvTax' => $totalInvTax,
            'totalInvDiscount' => $totalInvDiscount,
            'totalInvPending' => $totalInvPending,
            'totalInvDeny' => $totalInvDeny,
            'totalInvJustify' => $totalInvJustify,
            'netTotal' => $netTotal,
            'months' => $months,
            'years' => $years,
            'companyinformations' => $companyinformations,
            'companylogo' => $companylogo,
            'imageData' => $imageData,
        ])->render();

        $pdf = $landscappdfService->generatePdf($html);

        return response($pdf, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="Inventory-Download-'. date('d-M-Y') .'.pdf"');
    }

    // Data Export to Excel Sheet
    public function export(Request $request){

        $user_id = $request->input('user_id');
        $supplier_id = $request->input('supplier_id');
        $inv_id = $request->input('inv_id');
        $status = $request->input('status');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $medicine_group = $request->input('medicine_group');
        $medicine_dosage = $request->input('medicine_dosage');
        $medicine_origin = $request->input('medicine_origin');
        $medicine_name = $request->input('medicine_name');

        // Fetch inventory based on date range
        $query = Inventory::with([
            'medicine_names', 'medicine_groups', 'units',
            'users', 'roles', 'suppliers', 'sub_categories', 
            'medicine_origins', 'medicine_dogs'
        ])->orderBy('inventory_id', 'asc');

        // Apply date filter
        if ($start_date && $end_date) {
            $query->whereBetween('created_at', [
                Carbon::parse($start_date), 
                Carbon::parse($end_date)->endOfDay()
            ]);
        }

        // Apply additional filters
        if ($user_id) {
            $query->where('user_id', 'LIKE', '%' . $user_id . '%');
        }
        
        if ($supplier_id) {
            $query->where('supplier_id', 'LIKE', '%' . $supplier_id . '%');
        }
        if ($inv_id) {
            $query->where('inv_id', $inv_id);
        }
    
        if ($medicine_group) {
            $query->where('medicine_group', 'LIKE', '%' . $medicine_group . '%');
        }
        if ($medicine_dosage) {
            $query->where('medicine_dosage', $medicine_dosage);
        }
        if ($medicine_origin) {
            $query->where('medicine_origin', 'LIKE', '%' . $medicine_origin . '%');
        }
        if ($medicine_name) {
            $query->where('medicine_name', 'LIKE', '%' . $medicine_name . '%');
        }
    
        if ($status !== null) {
            if ($status === 'null') {
                $query->whereNull('status');
            } else {
                $query->where('status', $status);
            }
        }

        // Define the headers for the Excel file
        $headers = [
            'Content-Type' => 'application/vnd.ms-excel; charset=utf-8',
            'Content-Disposition' => 'attachment; filename=inventory_export-'. date('d-M-Y') .'.xls',
        ];

        // Start building the Excel content
        $content = "\xEF\xBB\xBF"; // UTF-8 BOM
        $content .= '<html>
                        <head>
                            <meta http-equiv="content-type" content="text/html; charset=UTF-8">
                        </head>
                        <body>';

        $content .= '<table>
                        <thead>
                            <tr></tr>
                            <tr style="background-color:lightgreen;color:black;">
                                <td></td>
                                <td colspan="4" style="font-size:25px;text-align:left;"><strong>GST Medicine Center</strong></td>
                            </tr>
                            <tr style="background-color:lightgreen;color:black;">
                                <td></td>
                                <td colspan="4" style="font-size:16px;text-align:left;"><strong>Medicine Inventory</strong></td>
                            </tr>
                            <tr style="background-color:lightcyan;">
                                <th style="text-align:left;font-size:15px;">SN.</th>
                                <th style="text-align:left;font-size:15px;">Inventory-ID</th>
                                <th style="text-align:left;font-size:15px;">Create Date</th>
                                <th style="text-align:left;font-size:15px;">Mfg.Date</th>
                                <th style="text-align:left;font-size:15px;">Exp.Date</th>
                                <th style="text-align:left;font-size:15px;">Group</th>
                                <th style="text-align:left;font-size:15px;">Medicine</th>
                                <th style="text-align:left;font-size:15px;">Dosage</th>
                                <th style="text-align:left;font-size:15px;">Units</th>
                                <th style="text-align:left;font-size:15px;">MRP</th>
                                <th style="text-align:left;font-size:15px;">Qty</th>
                                <th style="text-align:left;font-size:15px;">Amount</th>
                                <th style="text-align:left;font-size:15px;">VAT</th>
                                <th style="text-align:left;font-size:15px;">Tax</th>
                                <th style="text-align:left;font-size:15px;">Discount</th>
                                <th style="text-align:left;font-size:15px;">Sub Total</th>
                                <th style="text-align:left;font-size:15px;">Status</th>
                                <th style="text-align:left;font-size:15px;">Supplier-ID</th>
                                <th style="text-align:left;font-size:15px;">Supplier</th>
                            </tr>
                        </thead>
                    <tbody>';

        $inventories = $query->get();

        // Initialize total variables
        $totalQty = 0;
        $totalAmount = 0;
        $totalVAT = 0;
        $totalTax = 0;
        $totalDiscount = 0;
        $totalSubTotal = 0;
        $totalInvPending = 0;
        $totalInvDeny = 0;
        $totalInvJustify = 0;
        $total_inv = 0;
        $totalInvPendingQty = 0;
        $totalInvDenyQty = 0;
        $totalInvJustifyQty = 0;
        $total_inv_qty = 0;
        // Initialize serial number
        $serialNumber = 1;

        // Loop through inventory and add rows to the table
        foreach ($inventories as $export) {
            // Calculate totals
            $totalQty += $export->quantity;
            $totalAmount += $export->amount;
            $totalVAT += $export->vat_percentage;
            $totalTax += $export->tax_percentage;
            $totalDiscount += $export->discount_percentage;
            $totalSubTotal += $export->sub_total;
            $totalInvPending += $export->status === null ? $export->sub_total : 0;
            $totalInvDeny += $export->status == 0 ? $export->sub_total : 0;
            $totalInvJustify += $export->status == 1 ? $export->sub_total : 0;

            $totalUnauthorize = $totalInvDeny - $totalInvPending;
            $total_inv = $totalInvPending + $totalUnauthorize + $totalInvJustify;

            $totalInvPendingQty += $export->status === null ? $export->quantity : 0;
            $totalInvDenyQty += $export->status == 0 ? $export->quantity : 0;
            $totalInvJustifyQty += $export->status == 1 ? $export->quantity : 0;

            $totalUnauthorizeQty = $totalInvDenyQty - $totalInvPendingQty;
            $total_inv_qty = $totalInvPendingQty + $totalUnauthorizeQty + $totalInvJustifyQty;
            // Determine status class, text, color, and background
            if ($export->status === null) {
                $statusClass = 'text-dark';
                $statusText = 'Pending';
                $statusColor = 'color:black;background-color: white;cursor: pointer;';
                $statusBg = 'badge rounded-pill bg-gray';
            } elseif ($export->status == 0) {
                $statusClass = 'text-danger';
                $statusText = '❌ Unauthorize';
                $statusColor = 'color:orangered;background-color: white;cursor: pointer;';
                $statusBg = 'badge rounded-pill bg-warn';
            } elseif ($export->status == 1) {
                $statusClass = 'text-dark';
                $statusText = '✅ Authorize';
                $statusColor = 'color:darkgreen;background-color: #ecfffd;cursor: pointer;';
                $statusBg = 'badge rounded-pill bg-azure';
            }

            $content .= '<tr>';
            $content .= '<td style="text-align:left;font-size:14px;">' . $serialNumber++ . '</td>';
            $content .= '<td style="text-align:left;font-size:14px;">' . $export->inv_id . '</td>';
            $content .= '<td style="text-align:left;font-size:14px;">' . $export->created_at->format('d M Y h:i:sA') . '</td>';
            $content .= '<td style="text-align:left;font-size:14px;">' . $export->manufacture_date->format('d M Y') . '</td>';
            $content .= '<td style="text-align:left;font-size:14px;">' . $export->expiry_date->format('d M Y') . '</td>';
            $content .= '<td style="text-align:left;font-size:14px;">' . $export->medicine_groups->group_name . '</td>';
            $content .= '<td style="text-align:left;font-size:14px;">' . $export->medicine_names->medicine_name . '</td>';
            $content .= '<td style="text-align:left;font-size:14px;">' . $export->medicine_dogs->dosage . '</td>';
            $content .= '<td style="text-align:left;font-size:14px;">' . $export->units->units_name . '</td>';
            $content .= '<td style="text-align:left;font-size:14px;">' . $export->price . ' ৳' . '</td>';
            $content .= '<td style="text-align:center;font-size:14px;">' . $export->quantity . ' qty</td>';
            $content .= '<td style="font-weight:700;font-size:14px;">' . $export->amount . ' ৳' . '</td>';
            $content .= '<td style="text-align:left;font-size:14px;">' . $export->vat_percentage . '%</td>';
            $content .= '<td style="text-align:center;font-size:14px;">' . $export->tax_percentage . '%</td>';
            $content .= '<td style="text-align:center;font-size:14px;">' . $export->discount_percentage . '%</td>';
            $content .= '<td style="font-weight:700;font-size:14px;">' . $export->sub_total . ' ৳' . '</td>';
            $content .= '<td class="' . $statusClass . '" style="' . $statusColor . ' font-weight:700;font-size:14px;"><span class="' . $statusBg . '">' . $statusText . '</span></td>';
            $content .= '<td style="font-size:14px;">' . $export->suppliers->id_name . '</td>';
            $content .= '<td style="font-size:14px;">' . $export->suppliers->name . '</td>';
            $content .= '</tr>';
        }

        // Add the footer section
        $content .= '</tbody>
            <tfoot>
                <tr style="background-color:lightcyan;">
                    <td colspan="10" style="font-size:15px;text-align:center;"><strong>Totals:</strong></td>
                    <td style="text-align:center;font-size:15px;font-weight:700;border-bottom:1px double black;">' . number_format($totalQty, 2) . ' qty</td>
                    <td style="text-align:center;font-size:15px;font-weight:700;border-bottom:1px double black;">' . number_format($totalAmount, 2) . ' ৳</td>
                    <td style="text-align:left;font-size:15px;font-weight:700;border-bottom:1px double black;">' . number_format($totalVAT, 2) . '%</td>
                    <td style="text-align:center;font-size:15px;font-weight:700;border-bottom:1px double black;">' . number_format($totalTax, 2) . '%</td>
                    <td style="text-align:center;font-size:15px;font-weight:700;border-bottom:1px double black;">' . number_format($totalDiscount, 2) . '%</td>
                    <td style="text-align:center;font-size:15px;font-weight:700;border-bottom:1px double black;">' . number_format($totalSubTotal, 2) . ' ৳</td>
                    <td colspan="3"></td>
                </tr>
                <tr></tr>
                <tr>
                    <td></td>
                    <td colspan="2" style="font-size:15px;text-align:center;background-color:lightgreen;"><strong>Without(VAT, Tax and Discount Inventory)</strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td  style="font-size:15px;text-align:left;background-color:lightgreen;"><strong>Total Quantity </strong></td>
                    <td  style="font-size:15px;text-align:left;background-color:lightgreen;"><strong>' . number_format($totalQty, 2) . ' qty</strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="font-size:15px;background-color:lightgreen;"><strong>Total Inventories </strong></td>
                    <td style="font-size:15px;background-color:lightgreen;"><strong>' . number_format($totalAmount, 2) . ' ৳</strong></td>
                </tr>
                <tr></tr>
                <tr>
                    <td></td>
                    <td colspan="2" style="font-size:15px;text-align:center;background-color:yellow;"><strong>With(VAT, Tax and Discount Inventory)</strong></td>
                    <td></td>
                    <td colspan="3" style="font-size:15px;text-align:center;background-color:yellow;"><strong>Status Base On Inventories</strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>Total VAT </strong></td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>' . number_format($totalVAT, 2) . ' %</strong></td>
                    <td></td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>Pending</strong></td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>' . number_format($totalInvPendingQty, 2) . ' qty</strong></td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>' . number_format($totalInvPending, 2) . ' ৳</strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>Total Tax </strong></td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>' . number_format($totalTax, 2) . ' %</strong></td>
                    <td></td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>Authorize</strong></td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>' . number_format($totalInvJustifyQty, 2) . ' qty</strong> </td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>' . number_format($totalInvJustify, 2) . ' ৳</strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>Total Discount </strong></td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>' . number_format($totalDiscount, 2) . ' %</strong></td>
                    <td></td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>Unauthorize</strong></td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong> ' . number_format($totalUnauthorizeQty, 2) . ' qty</strong> </td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>' . number_format($totalUnauthorize, 2) . ' ৳</strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>Total Inventories </strong></td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>' . number_format($totalSubTotal, 2) . ' ৳</strong></td>
                    <td></td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>Total</strong></td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>' . number_format($total_inv_qty, 2) . ' qty</strong> </td>
                    <td style="font-size:15px;text-align:left;background-color:yellow;"><strong>' . number_format($total_inv, 2) . ' ৳</strong></td>
                </tr>
            </tfoot>
        </table></body></html>';

        // Create the response
        $response = Response::make($content, 200, $headers);

        return $response;
    }

    // Data Export to CSV format
    public function exportCsv(Request $request){
        $user_id = $request->input('user_id');
        $supplier_id = $request->input('supplier_id');
        $inv_id = $request->input('inv_id');
        $status = $request->input('status');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $medicine_group = $request->input('medicine_group');
        $medicine_dosage = $request->input('medicine_dosage');
        $medicine_origin = $request->input('medicine_origin');
        $medicine_name = $request->input('medicine_name');

        // Fetch inventory based on date range
        $query = Inventory::with([
            'medicine_names', 'medicine_groups', 'units',
            'users', 'roles', 'suppliers', 'sub_categories', 
            'medicine_origins', 'medicine_dogs'
        ])->orderBy('inventory_id', 'asc');

        // Apply date filter
        if ($start_date && $end_date) {
            $query->whereBetween('created_at', [
                Carbon::parse($start_date), 
                Carbon::parse($end_date)->endOfDay()
            ]);
        }

        // Apply additional filters
        if ($user_id) {
            $query->where('user_id', 'LIKE', '%' . $user_id . '%');
        }
        if ($supplier_id) {
            $query->where('supplier_id', 'LIKE', '%' . $supplier_id . '%');
        }
        if ($inv_id) {
            $query->where('inv_id', $inv_id);
        }
        if ($medicine_group) {
            $query->where('medicine_group', 'LIKE', '%' . $medicine_group . '%');
        }
        if ($medicine_dosage) {
            $query->where('medicine_dosage', $medicine_dosage);
        }
        if ($medicine_origin) {
            $query->where('medicine_origin', 'LIKE', '%' . $medicine_origin . '%');
        }
        if ($medicine_name) {
            $query->where('medicine_name', 'LIKE', '%' . $medicine_name . '%');
        }
        if ($status !== null) {
            if ($status === 'null') {
                $query->whereNull('status');
            } else {
                $query->where('status', $status);
            }
        }

        $inventories = $query->get();

        // Define the headers for the CSV file
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=inventory_export_'. date('d-M-Y') .'.csv',
        ];

        // Start building the CSV content
        $content = "\xEF\xBB\xBF"; // UTF-8 BOM

        // Create a file handle
        $file = fopen('php://temp', 'w');

        // Write headers to the CSV
        fputcsv($file, [
            'SN.', 
            'INV-ID', 
            'Create Date',
            'Mfg.Date',
            'Exp.Date', 
            'Group',
            'Medicine', 
            'Dosage', 
            'MRP',
            'Units', 
            'Qty', 
            'Amount',
            'VAT', 
            'Tax', 
            'Discount',
            'Sub Total', 
            'Status'
        ]);

        // Initialize total variables
        $totalQty = 0;
        $totalAmount = 0;
        $totalVAT = 0;
        $totalTax = 0;
        $totalDiscount = 0;
        $totalSubTotal = 0;
        $totalInvPending = 0;
        $totalInvDeny = 0;
        $totalInvJustify = 0;
        $total_inv = 0;
        $totalInvPendingQty = 0;
        $totalInvDenyQty = 0;
        $totalInvJustifyQty = 0;
        $total_inv_qty = 0;

        // Initialize serial number
        $serialNumber = 1;

        // Loop through inventory and add rows to the CSV
        foreach ($inventories as $export) {
            // Calculate totals
            $totalQty += $export->quantity;
            $totalAmount += $export->amount;
            $totalVAT += $export->vat_percentage;
            $totalTax += $export->tax_percentage;
            $totalDiscount += $export->discount_percentage;
            $totalSubTotal += $export->sub_total;
            $totalInvPending += $export->status === null ? $export->sub_total : 0;
            $totalInvDeny += $export->status == 0 ? $export->sub_total : 0;
            $totalInvJustify += $export->status == 1 ? $export->sub_total : 0;

            $totalUnauthorize = $totalInvDeny - $totalInvPending;
            $total_inv = $totalInvPending + $totalUnauthorize + $totalInvJustify;

            $totalInvPendingQty += $export->status === null ? $export->quantity : 0;
            $totalInvDenyQty += $export->status == 0 ? $export->quantity : 0;
            $totalInvJustifyQty += $export->status == 1 ? $export->quantity : 0;

            $totalUnauthorizeQty = $totalInvDenyQty - $totalInvPendingQty;
            $total_inv_qty = $totalInvPendingQty + $totalUnauthorizeQty + $totalInvJustifyQty;

            // Determine status class, text, color, and background
            $statusText = '';
            if ($export->status === null) {
                $statusClass = 'text-dark';
                $statusText = 'Pending';
                $statusColor = 'color:black;background-color: white;cursor: pointer;';
                $statusBg = 'badge rounded-pill bg-gray';
            } elseif ($export->status == 0) {
                $statusClass = 'text-danger';
                $statusText = '❌ Unauthorize';
                $statusColor = 'color:orangered;background-color: white;cursor: pointer;';
                $statusBg = 'badge rounded-pill bg-warn';
            } elseif ($export->status == 1) {
                $statusClass = 'text-dark';
                $statusText = '✅ Authorize';
                $statusColor = 'color:darkgreen;background-color: #ecfffd;cursor: pointer;';
                $statusBg = 'badge rounded-pill bg-azure';
            }

            fputcsv($file, [
                $serialNumber++,
                $export->inv_id,
                $export->created_at->format('d M Y h:i:sA'),
                $export->manufacture_date->format('d M Y'),
                $export->expiry_date->format('d M Y'),
                $export->medicine_groups->group_name,
                $export->medicine_names->medicine_name,
                $export->medicine_dogs->dosage,
                $export->units->units_name,
                $export->price . ' ৳',
                $export->quantity . ' qty',
                $export->amount . ' ৳',
                $export->vat_percentage . '%',
                $export->tax_percentage . '%',
                $export->discount_percentage . '%',
                $export->sub_total . ' ৳',
                $statusText
            ]);
        }
        // Add the footer section to the CSV
        fputcsv($file, []);
        fputcsv($file, [
            '', '', '', '', '', '', '', '', '',
            'Totals:',
            number_format($totalQty, 2) . ' qty',
            number_format($totalAmount, 2) . ' ৳',
            number_format($totalVAT, 2) . '%',
            number_format($totalTax, 2) . '%',
            number_format($totalDiscount, 2) . '%',
            number_format($totalSubTotal, 2) . ' ৳', 
            '', 
        ]);
        fputcsv($file, []);
        fputcsv($file, ['', '', 'Without (VAT, Tax and Discount)']);
        fputcsv($file, ['', 'Total Quantity', number_format($totalQty, 2) . ' qty']);
        fputcsv($file, ['', 'Total Inventories', number_format($totalAmount, 2) . ' ৳']);
        fputcsv($file, []);
        fputcsv($file, ['', '', 'With (VAT, Tax and Discount)', '', '', 'Status Base On Inventories']);
        fputcsv($file, [
            '', 'Total VAT', number_format($totalVAT, 2) . ' %', '', 'Pending',
            number_format($totalInvPendingQty, 2) . ' qty',
            number_format($totalInvPending, 2) . ' ৳'
        ]);
        fputcsv($file, [
            '', 'Total Tax', number_format($totalTax, 2) . ' %', '', 'Authorize',
            number_format($totalInvJustifyQty, 2) . ' qty',
            number_format($totalInvJustify, 2) . ' ৳'
        ]);
        fputcsv($file, [
            '', 'Total Discount', number_format($totalDiscount, 2) . ' %', '', 'Unauthorize',
            number_format($totalUnauthorizeQty, 2) . ' qty',
            number_format($totalUnauthorize, 2) . ' ৳'
        ]);
        fputcsv($file, [
            '', 'Total Inventories', number_format($totalSubTotal, 2) . ' ৳', '', 'Total',
            number_format($total_inv_qty, 2) . ' qty',
            number_format($total_inv, 2) . ' ৳'
        ]);

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

    // Print
    public function print(Request $request)
    {
        // Get filter parameters
        $user_id = $request->input('user_id');
        $supplier_id = $request->input('supplier_id');
        $inv_id = $request->input('inv_id');
        $status = $request->input('status');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $medicine_group = $request->input('medicine_group');
        $medicine_dosage = $request->input('medicine_dosage');
        $medicine_origin = $request->input('medicine_origin');
        $medicine_name = $request->input('medicine_name');

        // Initialize month and year arrays
        $months = [];
        $years = [];
    
        if ($start_date && $end_date) {
            $start = Carbon::parse($start_date)->startOfMonth();
            $end = Carbon::parse($end_date)->endOfMonth();
    
            while ($start->lte($end)) {
                $months[] = $start->format('F Y');
                $start->addMonth();
            }
            $years = array_unique(array_map(function($month) {
                return Carbon::parse($month)->format('Y');
            }, $months));
        }

        // Fetch inventory based on filters
        $query = Inventory::with([
            'medicine_names', 
            'medicine_groups', 
            'units', 
            'users', 
            'roles', 
            'suppliers', 
            'sub_categories', 
            'medicine_origins', 
            'medicine_dogs'
        ])->orderBy('inventory_id', 'asc');

        // Apply date filter
        if ($start_date && $end_date) {
            $query->whereBetween('created_at', [Carbon::parse($start_date), Carbon::parse($end_date)->endOfDay()]);
        }

        // Apply additional filters
        if ($user_id) {
            $query->where('user_id', 'LIKE', '%' . $user_id . '%');
        }
        if ($supplier_id) {
            $query->where('supplier_id', 'LIKE', '%' . $supplier_id . '%');
        }
        if ($inv_id) {
            $query->where('inv_id', $inv_id);
        }
        if ($medicine_group) {
            $query->where('medicine_group', 'LIKE', '%' . $medicine_group . '%');
        }
        if ($medicine_dosage) {
            $query->where('medicine_dosage', $medicine_dosage);
        }
        if ($medicine_origin) {
            $query->where('medicine_origin', 'LIKE', '%' . $medicine_origin . '%');
        }
        if ($medicine_name) {
            $query->where('medicine_name', 'LIKE', '%' . $medicine_name . '%');
        }
        if ($status !== null) {
            if ($status === 'null') {
                $query->whereNull('status');
            } else {
                $query->where('status', $status);
            }
        }

        $inventories = $query->get();

        $totalInvPendingQty = $totalInvDenyQty = $totalInvJustifyQty = 0;

        foreach ($inventories as $inventory) {
            $totalInvPendingQty += $inventory->status === null ? $inventory->quantity : 0;
            $totalInvDenyQty += $inventory->status == 0 ? $inventory->quantity : 0;
            $totalInvJustifyQty += $inventory->status == 1 ? $inventory->quantity : 0;
        }

        // Table Top header
        $totalPendingQuery = clone $query;
        $totalInvPending = $totalPendingQuery->whereNull('status')->sum('sub_total');
    
        $totalDenyQuery = clone $query;
        $totalInvDeny = $totalDenyQuery->where('status', '0')->sum('sub_total');
    
        $totalJustifyQuery = clone $query;
        $totalInvJustify = $totalJustifyQuery->where('status', '1')->sum('sub_total');

        $netTotal = $totalInvPending + $totalInvDeny + $totalInvJustify;

        $totalUnauthorizeQty = $totalInvDenyQty - $totalInvPendingQty;
        $total_inv_qty = $totalInvPendingQty + $totalUnauthorizeQty + $totalInvJustifyQty;

        $totalQty = $inventories->sum('quantity');
        $totalAmount = $inventories->sum('amount');
        $totalVAT = $inventories->sum('vat_percentage');
        $totalTax = $inventories->sum('tax_percentage');
        $totalDiscount = $inventories->sum('discount_percentage');
        $totalSubTotal = $inventories->sum('sub_total');

        // Convert image to base64
        $imagePath = public_path('image/log/comp-logo.png');
        $imageData = base64_encode(file_get_contents($imagePath)); 
        $companyinformations = ForntEndFooter::get();
        $companylogo = Logodegin::get();

        return view('super-admin.inventory-details.print', compact(
            'inventories', 
            'totalQty', 
            'totalAmount', 
            'totalVAT', 
            'totalTax', 
            'totalDiscount', 
            'totalSubTotal',
            'totalInvPending', 
            'totalInvDeny', 
            'totalInvJustify', 
            'netTotal', 
            'totalInvPendingQty', 
            'totalInvDenyQty', 
            'totalInvJustifyQty', 
            'totalUnauthorizeQty', 
            'total_inv_qty',
            'imageData',
            'companyinformations',
            'companylogo',
            'months',
            'years',
        ));
    }
    
}
