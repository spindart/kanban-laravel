<? header('Content-Type: text/html; charset=utf8'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt_BR">

<head>
    <title>KANBAN</title>

    <!-- Mobile device meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=4" />

    <!-- css -->
    <link rel="shortcut icon" href="{{ asset("assets/imagens/trello-desktop.jpg") }}" type="image/jpg" />
    <link rel="apple-touch-icon" href="{{ asset("assets/imagens/trello-desktop.jpg") }}" type="image/jpg" />
    <link rel="stylesheet" href="{{ asset("assets/bootstrap-3.3.7/css/bootstrap.min.css") }}" />
    <link rel="stylesheet" href="{{ asset("css/kanban.css") }}" />

    <!-- js -->
    <script src="{{ asset("js/jquery-1.11.2.min.js") }}"></script>
    <script src="{{ asset("assets/bootstrap-3.3.7/js/bootstrap.min.js") }}"></script>

    <!-- selectpicker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <!-- bootbox -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>



    <script type="text/javascript">
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<? flush(); ?>
<body style="width:100vw">
    @yield('content')
</body>

</html>
