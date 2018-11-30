<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <link rel="stylesheet" href="/css/app.css" />
    </head>
    <body>
        <div id="app">
            <path-encode-form></path-encode-form>
        </div>

        <script src="/js/app.js" type="application/javascript"></script>
    </body>
</html>
