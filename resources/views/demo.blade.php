<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel Demo</title>
        <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />
        <meta name="csrf-token" value="{{ csrf_token() }}" />
    </head>
    <body>
        <div id="app">
          <example-component></example-component>
        </div>
        <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
        <script>
            $(document).ready(function(){
                $(".page-item").click(function(){
                    var click = $(this)
                    $(".page-item").removeClass("highlight");
                    click.addClass("highlight");
                });
            });
        </script>
    </body>
</html>
