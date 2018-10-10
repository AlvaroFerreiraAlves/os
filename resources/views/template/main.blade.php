<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    @if(isset($title))
        <title>{{$title}}</title>
    @endif
<!-- Bootstrap core CSS -->
    <link href="{{url('assets/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="{{url('assets/css/sbnew.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/sbreset.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('assets/font-awesome/css/font-awesome.min.css')}}">

    <!-- Page Specific CSS -->
    {{--    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">--}}
</head>

<body>

<!-- JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="{{asset('js/index.js')}}"></script>



<div id="wrapper">

    @include('template.header')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                @if(isset($title))
                    <h1>{{$title}}</h1>
                @endif
                @if(auth()->check())
                <hr>
                    @endif

            </div>
        </div><!-- /.row -->

        @yield('content')


    </div><!-- /#page-wrapper -->

</div><!-- /#wrapper -->
</body>
</html>