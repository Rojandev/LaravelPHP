<!DOCTYPE html>
<html lang="en" >
    <head>
        <title>Laravel Quickstart - Basic</title>

        <!-- CSS And JavaScript -->
         <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>

    <body ng-app="taskRecords">

        @yield('content')
    </body>

     <!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
	<script type="text/javascript" src="{{ asset('app/lib/angular/angular.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>

	<!-- AngularJS Application Scripts -->
	<script src="{{ asset('app/app.js') }}"></script>
	<script src="{{ asset('app/controllers/task.js') }}"></script>
</html>
</html>