<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href=" {{ mix('css/app.css') }}" rel="stylesheet">

        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>

        <style>
          .nav {
            margin-top: 40px;
          }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div id="app">
                <layout></layout>
            </div>
        </div>
        <script src="{{ asset('js/bootstrap.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
