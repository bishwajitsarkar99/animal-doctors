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