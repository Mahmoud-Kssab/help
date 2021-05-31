 <ul>
   {{-- {{ generateCategories($categories)}} --}}
   {{ response()->json(  parents($cat, $arr = array()) ) }}
</ul>
{{-- <ul>

    @foreach ($categories as $cat)
        <li> {{ $cat->name }} </li>
    @endforeach

</ul> --}}
