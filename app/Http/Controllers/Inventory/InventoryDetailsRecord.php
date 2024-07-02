<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Medicine\Inventory;
use App\Models\MedicineGroup;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission\inventoryPermission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class InventoryDetailsRecord extends Controller
{
    // Inventory Details Record View
    public function index()
    {
        return view('super-admin.inventory-details.index');
    }
}
