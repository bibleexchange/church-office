<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Church Office</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="/css/all.css" rel="stylesheet" type="text/css" />
        <link href="/css/app.css" rel="stylesheet" type="text/css" />
		<script src="/js/jquery-1.10.2.min.js"></script>
		<script src="/js/jquery-ui.min.js"></script>
    </head>
    <body class="skin-blue">
		
		@include('flash::message')		
		<!-- ./ notifications -->
		
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="/" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <span class="icon">Church Office</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
           @include('navigation/index')
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
               @include('parts.sidebar')
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                   @yield('content-header')
                </section>

                <!-- Main content -->
                <section class="content">
					@yield('body')
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

		@yield('scripts-1')
		
        <script src="/js/all.js" type="text/javascript"></script>
		
		@yield('scripts')
		
    </body>
</html>