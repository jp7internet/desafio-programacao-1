<!DOCTYPE html>
<html>
    <head>
        <title>Vendas</title>
        <link href="/css/app.css" rel="stylesheet" type="text/css">
        <link href="/css/style.css" rel="stylesheet" type="text/css">
        <script src="/js/3rd-party.js" async=""></script>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    </head>
    <body>
        @include('shared.nav')
        <section id="content" class="container-fluid">
            @yield('content')
        </section>
    </body>
</html>
