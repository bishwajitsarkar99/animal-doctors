<select type="{{ $menuType }}" class="{{ $menuClass }}" name="{{ $menuName }}" id="{{ $menuId }}">
    <option value="">{{ $menuSelectLabel }}</option>
    {{$slot}}
</select>