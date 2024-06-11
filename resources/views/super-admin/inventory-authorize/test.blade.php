@foreach ($parents as $parent)
<tr class="parent-row" data-parent="{{ $parent->id }}">
    <td>{{ $parent->id }}</td>
    <td>{{ $parent->name }}</td>
    <!-- Add more data cells if needed -->
</tr>
@foreach ($parent->children as $child)
<tr class="child-row" data-parent="{{ $parent->id }}">
    <td></td>
    <td>{{ $child->name }}</td>
    <!-- Add more data cells if needed -->
</tr>
@endforeach
@endforeach

$parents = ParentModel::whereNull('parent_id')->get();
$children = ParentModel::whereNotNull('parent_id')->get();

return view('table', compact('parents', 'children'));



<tr class="parent-row table-row skeleton" data-parent="{{ $group->id }}">
    <td class="skeleton ps-1" style="cursor: pointer;"></td>
    <td class="skeleton ps-1" style="cursor: pointer;" colspan="8">{{ $group->group_name }}</td>
    <td class="skeleton">
        @if($group->quantity >0)
        <span>{{$group->quantity}} items</span>
        @else
        <span></span>
        @endif
    </td>
    <td class="skeleton" colspan="">
        @if($group->sub_total >0)
        <span>৳ {{$group->sub_total}}</span>
        @else
        <span></span>
        @endif
    </td>
    <td></td>
    <td></td>
</tr>

<!-- Your Blade View -->

<table>
    <thead>
        <tr>
            <th>Medicine Group</th>
            <th>Inventory Item</th>
        </tr>
    </thead>
    <tbody>
        @foreach($medicine_groups as $medicine_group)
            <tr>
                <td>{{ $medicine_group->name }}</td>
                <td>
                    @foreach($inventories->where('medicine_group_id', $medicine_group->id) as $inventory)
                        {{ $inventory->name }}
                        <br>
                    @endforeach
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

// Inventory.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    public function medicineGroup()
    {
        return $this->belongsTo(MedicineGroup::class);
    }
}
 
// MedicineGroup.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicineGroup extends Model
{
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}




// Define the enableDisableDeleteButton function
        const enableDisableDeleteButton = () => {
            $('.enable').each(function() {
                var permission = $(this).closest('tr').find('.permission').text().trim();
                if (permission === 'null') {
                    $(this).find('#deleteBtn').removeAttr('disabled');
                } else {
                    $(this).find('#deleteBtn').attr('disabled', 'disabled');
                }
            });
        };
        // Initial the enableDisableDeleteButton
        enableDisableDeleteButton();
        // change function 
        $(document).load('click', '.permission', function() {
            enableDisableDeleteButton();
        });



        <tbody class="bg-transparent skeleton" id="inventory_authorize_data_table">
            @foreach ($medicine_groups as $group)
            <tr class="parent-row table-row skeleton" data-parent="{{ $group['id'] }}">
                <td class="skeleton ps-1" style="cursor: pointer;"><span>{{ $group['id'] }}</span> ➤</td>
                <td class="skeleton ps-1" style="cursor: pointer;" colspan="7">{{ $group['group_name'] }}</td>
                <td></td>
                @if($group->quantity >0)
                <td class="skeleton edit_inventory_table" data-quantity="{{ $group['quantity'] }}">{{ $group['quantity'] }}</td>
                @else
                <td></td>
                @endif
                @if($group->sub_total >0)
                <td class="skeleton edit_inventory_table" data-sub-total="{{ $group['sub_total'] }}">{{ $group['sub_total'] }} ৳</td>
                @else
                <td></td>
                @endif
                <td></td>
                <td></td>
            </tr>
            @foreach ($inventories->where('medicine_group', $group['id']) as $inventory)
            <tr class="child-row child-row table-row user-table-row skeleton" style="
                @if(is_null($inventory->status))
                    color:gray;background-color: white;
                @elseif($inventory->status == 0)
                    color:darkgoldenrod;background-color: #ffedd8;
                @elseif($inventory->status == 1)
                    color:black;background-color: #ecfffd;
                @endif
            " data-parent="{{ $group['id'] }}">
                <td></td>
                <td class="line-height-td skeleton">
                    <a type="button" class="ps-1" style="color: black;font-weight:600;" data-id="{{ $inventory['inventory_id'] }}" id="invtr_id">{{$inventory['inventory_id']}}</a>
                    <input class="form-check-input check_permission ms-2 mt-1" type="checkbox" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="right" title="Authorize" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                </td>
                <td class="skeleton edit_inventory_table">{{ $inventory['inv_id'] }}</td>
                <?php
                    $manufactureDate = $inventory['manufacture_date'];
                    $expiryDate = $inventory['expiry_date'];
                ?>
                <td class="skeleton edit_inventory_table" data-manufacture-date="<?php echo htmlspecialchars($manufactureDate); ?>"></td>
                <td class="skeleton edit_inventory_table" data-expiry-date="<?php echo htmlspecialchars($expiryDate); ?>"></td>
                <td class="skeleton edit_inventory_table">{{ $inventory->medicine_names['medicine_name'] }}</td>
                <td class="skeleton edit_inventory_table">{{ $inventory->medicine_dogs['dosage'] ?? ''}}</td>
                <td class="skeleton edit_inventory_table" hidden></td>
                <td class="skeleton edit_inventory_table" data-price="{{ $inventory['price'] }}">{{ $inventory['price'] }} ৳</td>
                <td class="skeleton edit_inventory_table">{{ $inventory->units['units_name'] }}</td>
                <td class="skeleton edit_inventory_table" data-quantity="{{ $inventory['quantity'] }}">{{ $inventory['quantity'] }}</td>
                <td class="skeleton edit_inventory_table" data-sub-total="{{ $inventory['sub_total'] }}">{{ $inventory['sub_total'] }} ৳</td>
                <td class="skeleton edit_inventory_table" hidden>{{ $inventory['updated_by'] }}</td>
                <td class="skeleton edit_inventory_table" hidden>{{ $inventory['status_inv'] }}</td>
                <td class="skeleton">
                    @if(is_null($inventory->status))
                        <span class="badge rounded-pill bg-silver text-secondary" style="font-size:12px;">
                            Pending
                            <span class="fbox"><input id="light_focus" type="text" class="light3-focus" readonly></input></span>
                        </span>
                    @elseif($inventory->status == 1)
                        <span class="badge rounded-pill bg-azure text-dark" style="font-size:12px;">
                            ✅ Authorize
                            <span class="fbox"><input id="light_focus" type="text" class="light2-focus" readonly></input></span>
                        </span>
                    @elseif($inventory->status == 0)
                        <span class="badge rounded-pill bg-warn text-secondary" style="font-size:12px;">
                            ❌ Unauthorize
                            <span class="fbox"><input id="light_focus" type="text" class="light2-focus" readonly></input></span>
                        </span>
                    @endif
                </td>
            </tr>
            @endforeach
            @endforeach
        </tbody>
        {{ $inventories->appends(['per_page' => $perPage])->links() }}




        // var inventories = data.inventories;
                    // var html = '';
                    // if(inventories.length >0 ){
                    //     for(let i=0; i<inventories.length; i++){
                    //         let inventory = inventories[i];
                    //         let statusBadge = inventory.status == 0 ?
                    //         '<span class="badge rounded-pill bg-info text-dark">Pending<span class="fbox"><input id="light_focus" type="text" class="light3-focus" readonly></input></span></span>' :
                    //         '<span class="badge rounded-pill bg-primary text-white">Authorize<span class="fbox"><input id="light_focus" type="text" class="light2-focus" readonly></input></span></span>';

                    //         html += '<tr class="child-row table-row user-table-row " data-parent="' + inventory.group_id + '">\
                    //             <td>' + (i + 1) + '</td>\
                    //             <td class="line-height-td ">\
                    //                 <a type="button" class="ps-1" data-id="' + inventory.inventory_id + '" id="invtr_id">' + inventory.inventory_id + '</a>\
                    //                 <input class="form-check-input check_permission ms-2 mt-1" type="checkbox" style="font-size: 10px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Authorize" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template=\'<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>\'>\
                    //             </td>\
                    //             <td class="">' + inventory.inv_id + '</td>\
                    //             <td class="">' + formatDate(inventory.manufacture_date) + '</td>\
                    //             <td class="">' + formatDate(inventory.expiry_date) + '</td>\
                    //             <td class="">' + (inventory.medicine_names ? inventory.medicine_names.medicine_name : 'N/A') + '</td>\
                    //             <td class="">' + (inventory.medicine_dogs ? inventory.medicine_dogs.dosage : 'N/A') + '</td>\
                    //             <td class="" hidden></td>\
                    //             <td class="">' + inventory.price + ' ৳</td>\
                    //             <td class="">' + inventory.quantity + '</td>\
                    //             <td class="">' + inventory.sub_total + ' ৳</td>\
                    //             <td class="" hidden>' + inventory.updated_by + '</td>\
                    //             <td class="" hidden>' + inventory.status_inv + '</td>\
                    //             <td class="">' + statusBadge + '</td>\
                    //         </tr>';
                    //     }
                    // }
                    // else{
                    //     html += `
                    //         <tr>
                    //         <td style="text-align:center;" colspan="13">No Inventory Found.</td>
                    //         </tr>
                    //     `;
                    // }

                    // $("#inventory_authorize_data_table").html(html);







    public function getData(Request $request) {
        if (!$request->ajax()) {
            return abort(404);
        }
    
        $fiveMinutesAgo = Carbon::now()->subMinutes(5);
        $now = Carbon::now();
    
        $userEmail = Auth::user()->email;

        $query = Inventory::with([
                'suppliers', 
                'sub_categories', 
                'medicine_groups', 
                'medicine_names', 
                'medicine_origins', 
                'medicine_dogs', 
                'units'
            ])
            ->where(function($q) use ($fiveMinutesAgo, $now) {
                $q->whereBetween('updated_at', [$fiveMinutesAgo, $now]);
            })
            ->whereHas('user', function($q) use ($userEmail) {
                $q->where('email', $userEmail);
            })
            ->orderBy('inventory_id', 'desc');
    
        if ($searchQuery = $request->get('query')) {
            $query->where(function($q) use ($searchQuery) {
                $q->where('id_name', 'LIKE', '%' . $searchQuery . '%')
                  ->orWhere('medicine_name', 'LIKE', '%' . $searchQuery . '%')
                  ->orWhere('medicine_group', 'LIKE', '%' . $searchQuery . '%');
            });
        }
        $perPage = $request->input('per_item', 10);
        $data = $query->paginate($perPage);
        return response()->json($data, 200);
    }