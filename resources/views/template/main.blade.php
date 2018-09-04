<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{$title}}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{url('assets/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="{{url('assets/css/sbnew.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/sbreset.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('assets/font-awesome/css/font-awesome.min.css')}}">
    <script src="js/index.js"></script>
    <!-- Page Specific CSS -->
{{--    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">--}}
</head>

<body>

<!-- JavaScript -->
<script src="{{url('assets/js/jquery-1.10.2.js')}}"></script>
<script src="{{url('assets/js/bootstrap.js')}}"></script>

<!-- Page Specific Plugins -->
{{--<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>--}}
<script src="{{url('assets/js/morris/chart-data-morris.js')}}"></script>
{{--
<script src="{{url('assets/js/tablesorter/jquery.tablesorter.js')}}"></script>
<script src="{{url('assets/js/tablesorter/tables.js')}}"></script>
--}}

<div id="wrapper">

    @include('template.header')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1>{{$title}}</h1>
                <hr>

            </div>
        </div><!-- /.row -->

        @yield('content')


    </div><!-- /#page-wrapper -->

</div><!-- /#wrapper -->


</body>
</html>