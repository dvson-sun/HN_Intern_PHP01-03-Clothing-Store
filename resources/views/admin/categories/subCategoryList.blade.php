@foreach($subcategories as $subcategory)
    <option value="{{$subcategory->id}}"> {{$char}} {{$subcategory->name}}</br></option>
    @if(count($subcategory->subcategory))
        @php $char.'|---'; @endphp
        @include('admin.categories.subCategoryList',['subcategories' => $subcategory->subcategory, 'char' => $char.'|--'])
    @endif
@endforeach
