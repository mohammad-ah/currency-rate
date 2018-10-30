<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>
    <a href="/currencies" class="btn btn-def">Back</a>
    <h1>Currency</h1>
    @if(count($currency))
        <div>
            <h3>{{$currency}}</h3>
        </div>
    @else
        <p>No currency with the name found</p>
    @endif
    </body>
</html>
