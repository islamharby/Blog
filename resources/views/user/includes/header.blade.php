<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Home</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="{{asset('css/materialize.min.css')}}"  media="screen,projection"/>
        <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
        
        <!-- JavaScript at end of body for optimized loading -->
        <script type="text/javascript" src="{{asset('js/materialize.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/script.js')}}"></script>

        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea' });</script>
        <style type="text/css">
            nav{
                background-color: {{ App\Setting::value('MAIN_COLOR').'!important' }};
            }
            .card{
                background-color: {{ App\Setting::value('DARK_COLOR').'!important' }};                
            }

        </style>
    </head>

    <body >