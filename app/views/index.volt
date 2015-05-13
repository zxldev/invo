<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        {{ get_title() }}
        {{ stylesheet_link('css/bootstrap.min.css') }}
        {{ stylesheet_link('css/utils.css') }}
        <script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.js"></script>
        <script src="http://cdn.bootcss.com/jquery.devbridge-autocomplete/1.2.7/jquery.devbridge-autocomplete.min.js"></script>
<!--        {{ javascript_include('js/jquery.min.js') }}-->
        {{ javascript_include('js/bootstrap.min.js') }}
        {{ javascript_include('js/utils.js') }}
        <script src=""></script>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Your invoices">
        <meta name="author" content="Phalcon Team">
    </head>
    <body>
        {{ content() }}

    </body>
</html>