{{-- <ul>
   {{ generateCategories($categories)}}
</ul> --}}
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->


</head>
<body>
<form action="{{url('parents')}}">

<select name="cat">

    @foreach ($categories as $cat)

        <option value='{{ $cat->parent_id }}'>{{ $cat->name }}</option>
    @endforeach
</select>

<input type="submit" value="submite">

</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


</body>
</html>
