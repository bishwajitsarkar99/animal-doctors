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
    
        // Initialize the query builder
        $query = Inventory::with([
            'medicine_names', 'medicine_groups', 'medicine_dosages', 'units',
            'users', 'roles', 'suppliers', 'sub_categories', 'medicine_origins'
        ])->orderBy('inventory_id', 'desc')-get();
        
        // Apply date filter
        if ($start_date && $end_date) {
            $query->whereBetween('created_at', [
                Carbon::parse($start_date), 
                Carbon::parse($end_date)->endOfDay()
            ]);
        }
    
        // Apply additional filters
        if ($user_id) {
            $query->where('user_id', $user_id);
        }
    
        if ($inv_id) {
            $query->where('inv_id', 'LIKE', '%' . $inv_id . '%');
        }
    
        if ($medicine_group) {
            $query->where('medicine_group', 'LIKE', '%' . $medicine_group . '%');
        }
        if ($medicine_dosage) {
            $query->where('medicine_dosage', 'LIKE', '%' . $medicine_dosage . '%');
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