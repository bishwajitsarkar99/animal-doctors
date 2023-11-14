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